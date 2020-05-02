<?php
function gavias_edupia_check_registered_course($uid, $course_id){
  if($uid == 0) return false;
  $results = db_select('{commerce_order_item}', 'oi');
  $results->leftJoin('{commerce_order}', 'o', 'oi.order_id = o.order_id');
  $results->leftJoin('{commerce_product_variation_field_data}', 'v', 'oi.purchased_entity = v.variation_id');
  $results->fields('v', array('product_id', 'type'));
  $results->fields('o', array('state', 'uid'));
  $results->fields('oi', array('unit_price__number', 'total_price__number'));
  $results->condition(
    db_or()
      ->condition('o.state', 'payment_received', '=')
      ->condition('o.state', 'completed', '=')
  );
  $results->condition('v.product_id', $course_id, '=');
  $results->condition('o.uid', $uid, '=');
  $results->condition('v.type', 'course', '=');
  $orders = $results->execute()->fetchAll(PDO::FETCH_ASSOC);
  if(count($orders) > 0){
    return true;
  }
  return false;
}

global $gva_node_index;
function gavias_edupia_preprocess_course(&$vars){
  $vars['#cache']['max-age'] = 0;
  global $base_url;
  global $gva_node_index;
  $gva_node_index = $gva_node_index + 1;
  $vars['gva_node_index'] = $gva_node_index;

   $product_entity = $vars['product_entity'];
   $product = $vars['product'];
  
   $id = $product_entity->id();
   $video_link = '';

  if($product_entity->hasField('field_course_video')){
    $video_link = $product_entity->get('field_course_video')->getValue();
    if(isset($video_link[0]['value'])){
      $video_link = $video_link[0]['value'];
    }
  }

  if($product_entity->hasField('title')){
    $title = $product_entity->get('title')->getValue();
    if(isset($title[0]['value'])){
      $title = $title[0]['value'];
    }
  }

  if($product_entity->hasField('field_course_price_override')){
    $price_display = $product_entity->get('field_course_price_override')->getValue();
    if(isset($price_display[0]['value'])){
      $price_display = $price_display[0]['value'];
    }
  }

  $current_user = \Drupal::currentUser();
  $uid = $current_user->id();
  if(gavias_edupia_check_registered_course($uid, $id)){
    $vars['product']['variations'] = '<div class="user-registered">' . t('Registered') . '</div>';
  }


  $vars['video_link'] = $video_link;
  $vars['price_display'] = $price_display;
  $vars['title'] = $title;
  $vars['base_url'] = \Drupal::request()->getHost();
  return $vars;
}

function gavias_edupia_preprocess_commerce_product__course(&$vars){
  $vars = gavias_edupia_preprocess_course($vars);
}
function gavias_edupia_preprocess_commerce_product__course__teaser(&$vars){
  $vars = gavias_edupia_preprocess_course($vars);
}
function gavias_edupia_preprocess_commerce_product__course__teaser_2(&$vars){
  $vars = gavias_edupia_preprocess_course($vars);
}
function gavias_edupia_preprocess_commerce_product__course__featured(&$vars){
  $vars = gavias_edupia_preprocess_course($vars);
}

function gavias_edupia_preprocess_node__lesson(&$variables) {
  $variables['#attached']['library'][] = 'gavias_edupia/gavias-lesson-video';
  $lesson_access = 'registered';
  $lesson_content = '';
  $lesson_icon = 'fa fa-lock';
  $user = \Drupal::currentUser();
  $role = $user->getRoles();
  $course_id = 0;
  $role_admin = '';
  if($node = $variables['node']){
    if($node->hasField('field_lesson_access')){
      $lesson_access = $node->field_lesson_access->value;
    }
    if($node->hasField('field_lecture_course')){
      $field_lecture_course = $node->get('field_lecture_course');
      if(isset($field_lecture_course[0]) && isset($field_lecture_course[0]->target_id)){
            $course_id = $field_lecture_course[0]->target_id;
         }
    }

    if(in_array("administrator", $role)){
      $lesson_icon = 'fa fa-check';
      $role_admin = t(' Admin');
      if(isset($variables['content']['field_lesson_content'])){
        $lesson_content = $variables['content']['field_lesson_content'];
      }
    }else{
      if($lesson_access == 'registered'){
        if( $user->id() && gavias_edupia_check_registered_course($user->id(), $course_id) ){
          $lesson_icon = 'fa fa-check';
          if(isset($variables['content']['field_lesson_content'])){
            $lesson_content = $variables['content']['field_lesson_content'];
          }    
        }else{
          $lesson_content = '<div class="alert alert-info fade in alert-dismissable">' . t('Please Registered to view this lesson. ') . '<a href="'. base_path() .'/user"><strong>' . t('Login Page') . '</strong></a></div>';
        }

      }elseif ($lesson_access == 'logged_in'){
        if (!$user->id()) {
          $lesson_content = '<div class="alert alert-info fade in alert-dismissable">' . t('Please Login to view this lesson. ') . '<a href="'. base_path() .'/user"><strong>' . t('Login Page') . '</strong></a></div>';
        }
        else {
          if(isset($variables['content']['field_lesson_content'])){
            $lesson_content = $variables['content']['field_lesson_content'];
          }
          $lesson_icon = 'fa fa-check';
        }
      }elseif($lesson_access == 'public'){
        if(isset($variables['content']['field_lesson_content'])){
          $lesson_content = $variables['content']['field_lesson_content'];
        }
        $lesson_icon = 'fa fa-check';
      }else{
        if( $user->id() && gavias_edupia_check_registered_course($user->id(), $course_id) ){
          $lesson_icon = 'fa fa-check';
          if(isset($variables['content']['field_lesson_content'])){
            $lesson_content = $variables['content']['field_lesson_content'];
          }    
        }else{
          $lesson_content = '<div class="alert alert-info fade in alert-dismissable">' . t('Please register for course to view this lesson. ') . '<a href="'. base_path() .'/user"><strong>' . t('Login Page') . '</strong></a></div>';
        }
      }
    } 
  }
  $variables['course_id'] =  $course_id;
  $variables['lesson_content'] = $lesson_content;
  $variables['lesson_icon'] = $lesson_icon;
  $variables['role_admin'] = $role_admin;
}