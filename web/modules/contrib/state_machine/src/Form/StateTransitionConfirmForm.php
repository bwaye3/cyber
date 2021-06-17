<?php

namespace Drupal\state_machine\Form;

use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a confirmation form for performing an entity state transition.
 */
class StateTransitionConfirmForm extends ContentEntityConfirmFormBase {

  /**
   * The field name.
   *
   * @var string
   */
  protected $fieldName;

  /**
   * The transition.
   *
   * @var \Drupal\state_machine\Plugin\Workflow\WorkflowTransition
   */
  protected $transition;

  /**
   * {@inheritdoc}
   */
  public function getBaseFormId() {
    return 'state_machine_transition_confirm_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $field_name = '', $transition_id = '') {
    /** @var \Drupal\state_machine\Plugin\Field\FieldType\StateItemInterface $state_item */
    $state_item = $this->entity->get($field_name)->first();
    $transition = $state_item->getWorkflow()->getTransition($transition_id);
    $this->fieldName = $field_name;
    $this->transition = $transition;
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to %transition_label @entity_label?', [
      '%transition_label' => mb_strtolower($this->transition->getLabel()),
      '@entity_label' => $this->entity->label(),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->transition->getLabel();
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return $this->entity->toUrl('canonical');
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    /** @var \Drupal\state_machine\Plugin\Field\FieldType\StateItemInterface $state_item */
    $state_item = $this->entity->get($this->fieldName)->first();
    $state_item->applyTransition($this->transition);
    $this->entity->save();
    $form_state->setRedirectUrl($this->getCancelUrl());
  }

}
