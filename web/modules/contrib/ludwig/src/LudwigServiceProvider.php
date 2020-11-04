<?php

namespace Drupal\ludwig;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;

/**
 * Adds ludwig-managed packages to the autoloader.
 *
 * Service providers are only executed when the container is being built,
 * removing the need to cache the module's package information.
 */
class LudwigServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function register(ContainerBuilder $container) {
    $root = \Drupal::hasService('app.root') ? \Drupal::root() : DRUPAL_ROOT;
    $package_manager = new PackageManager($root);
    $namespaces = $container->getParameter('container.namespaces');
    foreach ($package_manager->getPackages() as $package_name => $package) {
      if ($package['installed']) {
        if ($package['autoload_type'] == 'classmap' || $package['autoload_type'] == 'files') {
          // @todo: Add support for 'classmap' and 'files' autoload types.
        }
        else {
          $namespace = $package['namespace'];
          $namespaces[$namespace] = $package['path'];
          if (!empty($package['src_dir'])) {
            $namespaces[$namespace] .= '/' . $package['src_dir'];
          }
        }
      }
    }
    $container->setParameter('container.namespaces', $namespaces);
  }

}
