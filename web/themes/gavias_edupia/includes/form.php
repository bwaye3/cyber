<?php
use Drupal\Core\Template\Attribute;

function gavias_edupia_form_views_exposed_form_alter(array &$form) {
  //You need to verify the id
  global $base_url;
  
  $form['sort_by']['#weight'] = '-3';
  $form['sort_order']['#weight'] = '-2';

  $form['title']['#attributes']['placeholder'] = $form['#info']['filter-title']['label'];
  //unset($form['#info']['filter-title']['label']);

  foreach ($form['#info'] as $filter_info) {
    $filter = $filter_info['value'];
    if ($form[$filter]['#type'] == 'select') {
      $form[$filter]['#options']['All'] = $filter_info['label'];
      //unset($form['#info']['filter-' . $filter]['label']);
    }
  }

  $course_search_action = '';
  if(theme_get_setting('course_search_action')){
    $course_search_action = theme_get_setting('course_search_action');
  }
  switch ($form['#id']) {
    case 'views-exposed-form-courses-course-filter':
      if($course_search_action){
        $form['#action'] = base_path() . $course_search_action;
      }
      break;
  }
}

