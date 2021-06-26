<?php

function gavias_content_builder_delete($gid) {
  return drupal_get_form('gavias_content_builder_delete_confirm_form');
}

function gavias_content_builder_delete_confirm_form($form_state) {
  $form = array();
  $form['id'] = array(
    '#type'=>'hidden',
    '#default_value' => arg(2)
  );
  return confirm_form($form, 'Do you really want to detele this block bulider ?', 'admin/gavias_content_builder', NULL, 'Delete', 'Cancel');
}

function gavias_content_builder_delete_confirm_form_submit($form, &$form_state){
  $gid = $form['id']['#value'];
  \Drupal::database()->delete('gavias_content_builder')
          ->condition('id', $gid)
          ->execute();
  \Drupal::messenger()->addMessage('The block bulider has been deleted');
  drupal_goto('admin/gavias_content_builder');
}

function gavias_content_builder_export($gid){
  $pbd_single = gavias_content_builder_load($gid);
  $data = $pbd_single->params;
  header("Content-Type: text/txt");
  header("Content-Disposition: attachment; filename=gavias_content_builder_export.txt");
  print $data;
  exit;
}

function gavias_content_builder_import($bid) {
  $bid = arg(2);
  if (is_numeric($bid)) {
    $bblock = \Drupal::database()->select('{gavias_content_builder}', 'd')
       ->fields('d')
       ->condition('id', $bid, '=')
       ->execute()
       ->fetchAssoc();
  } else {
    $bblock = array('id' => 0, 'title' => '');
  }

  if($bblock['id']==0){
    \Drupal::messenger()->addMessage('Not found gavias block builder !');
    return false;
  }

  $form = array();
  $form['id'] = array(
      '#type' => 'hidden',
      '#default_value' => $bblock['id']
  );
  $form['params'] = array(
      '#type' => 'textarea',
      '#title' => 'Past code import for block builder "'.$bblock['title'].'"',
      '#default_value' => ''
  );
  $form['submit'] = array(
      '#type' => 'submit',
      '#value' => 'Save'
  );
  return $form;
}

function gavias_content_builder_import_submit($form, $form_state) {
  if ($form['id']['#value']) {
    $id = $form['id']['#value'];
    $builder = \Drupal::database()->update("gavias_content_builder")
      ->fields(array(
          'params' => $form['params']['#value'],
      ))
      ->condition('id', $id)
      ->execute();
    drupal_goto('admin/gavias_content_builder/'.$id.'/edit');
    \Drupal::messenger()->addMessage("Block Builder '{$form['title']['#value']}' has been updated");
  } 
}