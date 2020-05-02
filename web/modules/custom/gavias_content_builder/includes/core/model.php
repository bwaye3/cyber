<?php
function gavias_content_builder_load($pid) {
  $result = db_select('{gavias_content_builder}', 'd')
          ->fields('d')
          ->condition('id', $pid, '=')
          ->execute()
          ->fetchObject();
  $page = new stdClass();
  if($result){
    $page->title =  $result->title;
    $page->id = $result->id;  
    $page->params = $result->params;  
  }else{
    $page->title = '';
    $page->params = array();
  }
  return $page;
}

function gavias_content_builder_load_by_machine($mid) {
  $result = db_select('{gavias_content_builder}', 'd')
          ->fields('d', array('id', 'title', 'params'))
          ->condition('body_class', $mid, '=')
          ->execute()
          ->fetchObject();
  $page = new stdClass();
  if($result){
    $page->id = $result->id;
    $page->title = $result->title;
    $page->params = $result->params;  
  }else{
    return false;
  }
  $result = null;
  return $page;
}

function gavias_content_builder_check_machine($id, $mid){
  $result = db_select('{gavias_content_builder}', 'd')
    ->fields('d')
    ->condition('id', $id , '<>')
    ->condition('body_class', $mid, '=')
    ->execute()
    ->fetchObject();
  if($result && $result->body_class){
    return true;
  }   
  return false;
}

function gavias_content_builder_get_list(){
  $result = db_select('{gavias_content_builder}', 'd')
    ->fields('d')
    ->execute();
  return $result;
}