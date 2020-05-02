<?php

/**
 * Plugin implementation of the 'gavias_content_builder' field type.
 *
 * @FieldType(
 *   id = "gavias_content_builder",
 *   label = @Translation("Gavias Content Builder"),
 *   module = "gavias_content_builder",
 *   description = @Translation("Gavias Content Builder Field."),
 *   default_widget = "gavias_content_builder_widget",
 *   default_formatter = "gavias_content_builder_formatter"
 * )
 */

namespace Drupal\gavias_content_builder\Plugin\Field\FieldType;

use Drupal\gavias_blockbuilder\BuilderBase;
use Drupal\Core\Database;
use Drupal\Core\Entity\Entity;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Form\FormStateInterface;


class GaviasContentBuilder extends FieldItemBase {
  
  public static function defaultFieldSettings() {
    return [
      'role_field_gcb' => array(),
    ] + parent::defaultFieldSettings();
  }

  public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
    $element = [];
    $settings = $this->getSettings();
    $tmp_roles = \Drupal\user\Entity\Role::loadMultiple();
    $roles = array();
    foreach ($tmp_roles as $key => $role) {
      $roles[$key] = $role->get('label');
    }
    $element['role_field_gcb'] = [
      '#type'          => 'checkboxes',
      '#title'         => $this->t('Roles'),
      '#default_value' => $settings['role_field_gcb'],
      '#options'       => $roles,
      '#description'   => 'When the user has the following roles'
    ];
    return $element;
  }

  /**
   * {Inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['bid'] = DataDefinition::create('integer')
      ->setLabel(t('Gavias Builder ID'))
      ->setDescription(t('A Builder ID referenced the Gavias Builder'));
    return $properties;
  }
  
  /**
   * {Inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $columns = array(
      'bid' => array(
        'description' => 'The Block buider ID being referenced in this field.',
        'type' => 'int',
        'unsigned' => TRUE,
      ),
    );

    $schema = array(
      'columns' => $columns,
      'indexes' => array(
        'bid' => array('bid'),
      ),
    );

    return $schema;
  }

  public function isEmpty() {
    $value = $this->get('bid')->getValue();
    return $value === NULL || $value === '';
  }
}