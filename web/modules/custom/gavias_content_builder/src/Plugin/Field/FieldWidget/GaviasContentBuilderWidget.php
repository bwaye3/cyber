<?php

/**
 * Plugin implementation of the 'gavias_content_builder' widget.
 *
 * @FieldWidget(
 *   id = "gavias_content_builder_widget",
 *   label = @Translation("Gavias Content Builder"),
 *   field_types = {
 *     "gavias_content_builder"
 *   }
 * )
 */
namespace Drupal\gavias_content_builder\Plugin\Field\FieldWidget;

use Drupal\gavias_content_builder\BuilderBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\user\Entity\User;

class GaviasContentBuilderWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $element = parent::settingsForm($form, $form_state);

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    
    $field_settings = $this->getFieldSettings();
    $results = db_select('{gavias_content_builder}', 'd')
      ->fields('d', array('id', 'title'))
      ->orderBy('title', 'ASC')
      ->execute();

    $list_gcb = array( ''   => 'Disable');
    foreach ($results as $key => $result) {
      $list_gcb[$result->id] = $result->title;
    }

    if (isset($form['#parents'][0]) && $form['#parents'][0] == 'default_value_input' && !empty($element['#field_parents'][0] && $element['#field_parents'][0] == 'default_value_input')) {
      $element['bid'] = array(
        '#type' => 'hidden',
        '#default_value' => 0,
      );

      $element['default'] = [
        '#type' => 'select',
        '#title' => $this->t('Default'),
        '#default_value' => $items[$delta]->default,
        '#options' => $list_gcb,
      ];
      return $element;

    }
    $parent_entity = $items->getEntity();
    $entity = $parent_entity;

    $user = \Drupal::currentUser();
    $role_field_gcb = isset($field_settings['role_field_gcb']) ? $field_settings['role_field_gcb'] : array(); //Show field via roles
    $role_field_gcb = array_filter($role_field_gcb);

    $flag_use_role = false;
    if($role_field_gcb){
      $use_roles = $user->getRoles();
      if($role_field_gcb){
        foreach ($role_field_gcb as $key => $role) {
          if ($role && in_array($role, $use_roles)) {
            $flag_use_role = true;
          }
        }
      }
    }else{
      $flag_use_role = true;
    }
    //print $flag_use_role;
    if (!$user->hasPermission('administer gavias_content_builder')) {
      return;
    }
    
    $langcode = $items->getLangcode();

    $field_name = $items->getName();
    $input = $form_state->getUserInput();

    $results = db_select('{gavias_content_builder}', 'd')
      ->fields('d', array('id', 'title'))
      ->condition('use_field', 1)
      ->orderBy('title', 'ASC')
      ->execute();

    $list_builder = array( ''   => 'Disable');
    foreach ($results as $key => $result) {
      $list_builder[$result->id] = $result->title;
    }

    $bid = !empty($items[$delta]->bid) ? $items[$delta]->bid : $items[$delta]->default;
    
    $random = gavias_content_builder_makeid(10);

    if($flag_use_role){
      $links = array(
        '#type' => 'link',
        '#title' => t('<strong>Add New Builder</strong>'),
        '#url' => Url::fromRoute('gavias_content_builder.admin.add_popup', array('random'=>$random)),
        '#attributes' => array(
          'class' => array('use-ajax'),
          'data-dialog-type' => 'modal',
          'data-dialog-options' =>  json_encode(array(
              'resizable' => TRUE,
              'width' => '80%',
              'height' => 'auto',
              'max-width' => '1100px',
              'modal' => TRUE,
            )),
          'title' => t('Add new builder'),
        ),
      );
      $element['addform'] = $links;
    }

    $element['bid'] = array(
      '#title' => $items->getFieldDefinition()->getLabel() . (' <a class="gva-popup-iframe" href="'.\Drupal::url('gavias_content_builder.admin', array('gva_iframe'=> 'on')).'">Manage All Blockbuilders</a>'),
      '#type' => 'textfield',
      '#default_value' => $bid,
      '#attributes' => array('class' => array('field_gavias_content_builder', 'gva-id-' . $random), 'data-random' => $random, 'readonly'=>'readonly')
    );
    if($flag_use_role){
      $element['bid']['#title'] = $items->getFieldDefinition()->getLabel() . (' <a class="gva-popup-iframe" href="'.\Drupal::url('gavias_content_builder.admin', array('gva_iframe'=> 'on')).'">Manage All Blockbuilders</a>');
    }else{
      $element['bid']['#title'] = $items->getFieldDefinition()->getLabel();
    }

    if($flag_use_role){
      $element['choose_gbb'] = array(
        '#type' => 'markup',
        '#markup' => $this->_get_list_blockbuilder($random),
        '#allowed_tags' => array('a', 'div', 'span')
      );
    }
    return $element;
  }

  function _get_list_blockbuilder($random){
    $results = db_select('{gavias_content_builder}', 'd')
      ->fields('d', array('id', 'title', 'machine_name'))
      ->orderBy('title', 'ASC')
      ->execute();
      $html = '<div class="gva-choose-gbb gva-id-'.$random.'">';
      $html .= '<span class="gbb-item disable"><a class="select" data-id="" title="disable">Disable</a></span>';
      foreach ($results as $key => $result) {
        $html .= '<span class="gbb-item id-'.$result->id.'">';
        $html .= '<a class="select" data-id="'.$result->id.'" title="'. $result->machine_name .'">' . $list_builder[$result->id] = $result->title  . '</a>';
        $html .= ' <span class="action">( <a class="edit gva-popup-iframe" href="'.\Drupal::url('gavias_content_builder.admin.edit', array('bid'=>$result->id)).'?gva_iframe=on" data-id="'.$result->id.'" title="'. $result->machine_name .'">Edit</a>';
        $html .= ' | <a class="duplicate use-ajax" data-dialog-type="modal" data-dialog-options="{"resizable":true,"width":"80%","height":"auto","max-width":"1100px","modal":true}" href="'.\Drupal::url('gavias_content_builder.admin.duplicate_popup', array('bid'=>$result->id, 'random'=>$random)).'" data-id="'.$result->id.'" title="'. $result->machine_name .'">Duplicate</a>';
        $html .= ' | <a class="import use-ajax" data-dialog-type="modal" data-dialog-options="{"resizable":true,"width":"80%","height":"auto","max-width":"1100px","modal":true}" href="'.\Drupal::url('gavias_content_builder.admin.import_popup', array('bid'=>$result->id)).'" data-id="'.$result->id.'" title="'. $result->machine_name .'">Import</a> ';
        $html .= ' | <a class="export" href="'.\Drupal::url('gavias_content_builder.admin.export', array('bid'=>$result->id)).'" data-id="'.$result->id.'" title="'. $result->machine_name .'">Export</a>';
        $html .= ' | <a class="delete use-ajax" data-dialog-type="modal" data-dialog-options="{"resizable":true,"width":"80%","height":"auto","max-width":"1100px","modal":true}" href="'.\Drupal::url('gavias_content_builder.admin.delete_popup', array('bid'=>$result->id, 'random'=>$random)).'" data-id="'.$result->id.'" title="'. $result->machine_name .'">Delete</a> )</span>';
        $html .= '</span>';
      }
    $html .= '</div>';
    return $html;
  }
  
}