<?php

namespace Drupal\ludwig;

use Drupal\Core\Extension\ExtensionDiscovery;

/**
 * Provides information about ludwig-managed packages.
 *
 * Extensions (modules, profiles) can define a ludwig.json which is
 * discovered by this class. This discovery works even without a
 * Drupal installation, and covers non-installed extensions.
 */
class PackageManager implements PackageManagerInterface {

  /**
   * The app root.
   *
   * @var string
   */
  protected $root;

  /**
   * Constructs a new PackageManager object.
   *
   * @param string $root
   *   The app root.
   */
  public function __construct($root) {
    $this->root = $root;
  }

  /**
   * {@inheritdoc}
   */
  public function getPackages() {
    $listing = new ExtensionDiscovery($this->root);
    // Get all profiles, and modules belonging to those profiles.
    $profiles = $listing->scan('profile');
    $profile_directories = array_map(function ($profile) {
      return $profile->getPath();
    }, $profiles);
    $listing->setProfileDirectories($profile_directories);
    $modules = $listing->scan('module');
    /** @var \Drupal\Core\Extension\Extension[] $extensions */
    $extensions = $profiles + $modules;

    $packages = [];
    foreach ($extensions as $extension_name => $extension) {
      $extension_path = $extension->getPath();
      $config = $this->jsonRead($this->root . '/' . $extension_path . '/ludwig.json');
      $config += [
        'require' => [],
      ];

      foreach ($config['require'] as $package_name => $package_data) {
        $package_name_static = $package_name;
        $package_path = $extension_path . '/lib/' . str_replace('/', '-', $package_name) . '/' . $package_data['version'];
        $package = $this->jsonRead($this->root . '/' . $package_path . '/composer.json');
        $description = !empty($package['description']) ? $package['description'] : '';
        $homepage = !empty($package['homepage']) ? $package['homepage'] : '';
        if (!empty($package['autoload'])) {
          // Iterate through all autoload types.
          $autoload_types = array_keys($package['autoload']);
          count($autoload_types) > 1 ? $multi = TRUE : $multi = FALSE;
          foreach ($autoload_types as $autoload_type) {
            if (!empty($package['autoload'][$autoload_type])) {
              if ($autoload_type == 'files' || $autoload_type == 'classmap') {
                $autoload = $package['autoload'];
                $package_namespaces = [$autoload_type];
              }
              else {
                $autoload = $package['autoload'][$autoload_type];
                $package_namespaces = array_keys($autoload);
              }
              if (count($package_namespaces) > 1) {
                $multi = TRUE;
              }
              // Iterate through all resources inside this autoload type.
              foreach ($package_namespaces as $namespace) {
                $src_dir = $autoload[$namespace];
                // Support for both single path (string) and multiple
                // paths (array) inside one resource.
                $srcdir = [];
                is_array($src_dir) ? $srcdir = $src_dir : $srcdir[0] = $src_dir;
                if (count($srcdir) > 1) {
                  $multi = TRUE;
                }
                foreach ($srcdir as $src_dir) {
                  $src_dir = rtrim($src_dir, './');
                    if ($multi) {
                      $package_name = $package_name_static . ' | ' . $src_dir;
                    }
                  // Autoloading fails if the namespace ends with a backslash.
                  $namespace = trim($namespace, '\\');
                  // Core only assumes that LudwigServiceProvider is adding
                  // PSR-4 paths, each PSR-0 path needs to be converted
                  // in order to work.
                  if ($autoload_type == 'psr-0' && !empty($namespace)) {
                    if (!empty($src_dir)) {
                      $src_dir .= '/';
                    }
                    $src_dir .= str_replace('\\', '/', $namespace);
                  }
                  $packages[$package_name] = [
                    'name' => $package_name,
                    'version' => $package_data['version'],
                    'description' => $description,
                    'homepage' => $homepage,
                    'provider' => $extension_name,
                    'provider_path' => $extension_path,
                    'download_url' => $package_data['url'],
                    'path' => $package_path,
                    'namespace' => $namespace,
                    'src_dir' => $src_dir,
                    'installed' => !empty($namespace),
                    'autoload_type' => $autoload_type,
                  ];
                }
              }
            }
          }
        }
        else {
          $packages[$package_name] = [
            'name' => $package_name,
            'version' => $package_data['version'],
            'description' => $description,
            'homepage' => $homepage,
            'provider' => $extension_name,
            'provider_path' => $extension_path,
            'download_url' => $package_data['url'],
            'path' => $package_path,
            'namespace' => '',
            'src_dir' => '',
            'installed' => FALSE,
            'autoload_type' => 'unknown',
          ];
        }
      }
    }

    return $packages;
  }

  /**
   * Reads and decodes a json file into an array.
   *
   * @param string $filename
   *   Name of the file to read.
   *
   * @return array
   *   The decoded json data.
   */
  protected function jsonRead($filename) {
    $data = [];
    if (file_exists($filename)) {
      $data = file_get_contents($filename);
      $data = json_decode($data, TRUE);
      if (!$data) {
        $data = [];
      }
    }

    return $data;
  }

}
