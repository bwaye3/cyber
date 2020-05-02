<?php
/**
 * @file
 * Contains \Drupal\gavias_content_builder\Controller\GaviasContentBuilderController.
 */
namespace Drupal\gavias_content_builder\Controller;

use  Drupal\Core\Cache\Cache;
use Drupal\Core\Url;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;

class GaviasContentBuilderController extends ControllerBase {

  public function gavias_content_builder_list(){
    $page['#attached']['library'][] = 'gavias_content_builder/gavias_content_builder.assets.admin';
    $header = array( 'ID', 'Title', 'Action');
    $results = db_select('{gavias_content_builder}', 'd')
            ->fields('d', array('id', 'title', 'machine_name'))
            ->orderBy('title', 'ASC')
            ->execute();
    $rows = array();
    foreach ($results as $row) {

      $tmp =  array();
      $tmp[] = $row->id;
      $tmp[] = $row->title;
      $tmp[] = t('<a href="@link">Change Name</a> | <a href="@link_2">Configuration</a> |  <a href="@link_3">Delete</a> | <a href="@link_4">Duplicate</a> | <a href="@link_5">Export</a>', array(
            '@link' => \Drupal::url('gavias_content_builder.admin.add', array('bid' => $row->id)),
            '@link_2' => \Drupal::url('gavias_content_builder.admin.edit', array('bid' => $row->id)),
            '@link_3' => \Drupal::url('gavias_content_builder.admin.delete', array('bid' => $row->id)),
            '@link_4' => \Drupal::url('gavias_content_builder.admin.clone', array('bid' => $row->id)),
            '@link_5' => \Drupal::url('gavias_content_builder.admin.export', array('bid' => $row->id)),
        ));
      $rows[] = $tmp;
    }
    
    $page['gbb-admin-list'] = array(
      '#theme' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#empty' => t('No Content Builder Available. <a href="@link">Add Content Builder</a>', array('@link' => \Drupal::url('gavias_content_builder.admin.add', array('bid'=>0)))),
    );
    return $page;
  }

  public function gavias_content_builder_edit($bid) {
    require_once GAVIAS_CONTENT_BUILDER_PATH . '/includes/utilities.php';

    $page['#attached']['library'][] = 'gavias_content_builder/gavias_content_builder.assets.admin';

    $page['#attributes']['classes_array'][] = 'form-blockbuilder';

    $abs_url_config = \Drupal::url('gavias_content_builder.admin.save', array(), array('absolute' => FALSE)); 
    
    $page['#attached']['drupalSettings']['gavias_content_builder']['saveConfigURL'] = $abs_url_config;

    $page['#attached']['drupalSettings']['gavias_content_builder']['base_path'] = base_path();

    $page['#attached']['drupalSettings']['gavias_content_builder']['path_modules'] = base_path()  . drupal_get_path('module', 'gavias_content_builder');

    $url_redirect = '';
    
    if(isset($_GET['destination']) && $_GET['destination']){
      $url_redirect = $_GET['destination'];
    }
    
    $pbd_single = gavias_content_builder_load($bid);
    $el_fields = gavias_pagebuilder_get_el_fields();
    $gbb_title = $pbd_single->title;
    $gbb_id = $pbd_single->id;
    $params = $pbd_single->params;
    $page['#attached']['drupalSettings']['gavias_content_builder']['params'] = $params ? $params : '[{}]';
    $page['#attached']['drupalSettings']['gavias_content_builder']['element_fields'] = $el_fields;

    //Translate
    $page['#attached']['drupalSettings']['gavias_content_builder']['text_translate']['cancel'] = t('Cancel');
    $page['#attached']['drupalSettings']['gavias_content_builder']['text_translate']['update'] = t('Update');
    
    ob_start();

    include drupal_get_path('module', 'gavias_content_builder') . '/templates/backend/form.php';

    $content = ob_get_clean();
    $page['gcb-admin-form'] = array(
      '#theme' => 'gcb-admin-form',
      '#content' => $content
    );
    return $page;
  }

  public function gavias_content_builder_save(){
    header('Content-type: application/json');
    $data = $_REQUEST['data'];
    $pid = $_REQUEST['pid'];

    db_update("gavias_content_builder")
          ->fields(array(
              'params' => $data,
          ))
          ->condition('id', $pid)
          ->execute();
    
    \Drupal::service('plugin.manager.block')->clearCachedDefinitions();     
    foreach (Cache::getBins() as $service_id => $cache_backend) {
      if($service_id == 'render' || $service_id == 'page'){
        $cache_backend->deleteAll();
      }
    }

    $result = array(
      'data' => 'update saved'
    );
 
    print json_encode($result);
    exit(0);
  }

  public function gavias_content_builder_export($bid){
    $pbd_single = gavias_content_builder_load($bid);
    $data = $pbd_single->params;
    $title = date('Y_m_d_h_i_s') . '_bb_export'; 
    header("Content-Type: text/txt");
    header("Content-Disposition: attachment; filename={$title}.txt");
    print $data;
    exit;
  }
}
