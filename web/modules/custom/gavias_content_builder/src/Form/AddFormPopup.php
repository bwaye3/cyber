<?php
namespace Drupal\gavias_content_builder\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\CloseDialogCommand;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\InvokeCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;
use Drupal\Core\Url;
class AddFormPopup extends FormBase{

  /**
   * {@inheritdoc}.
   */
  public function getFormId(){
    return 'add_form_popup';
  }

  /**
   * {@inheritdoc}.
  */
  public function buildForm(array $form, FormStateInterface $form_state){
  if(\Drupal::request()->attributes->get('random')) $random = \Drupal::request()->attributes->get('random');
    $args = $this->getFormArgs($form_state);
    $form['builder-dialog-messages'] = array(
      '#markup' => '<div id="builder-dialog-messages"></div>',
    );
    $form['random'] = array(
      '#type' => 'hidden',
      '#default_value' => $random
    );
    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => 'Title',
      '#default_value' => $bblock['title']
    );
     $form['machine_name'] = array(
      '#type' => 'textfield',
      '#title' => 'Machine name',
      '#description' => 'A unique machine-readable name containing letters, numbers, and underscores<br>Sample home_page_1',
      '#default_value' => $bblock['machine_name']
    );
    $form['use_field'] = array(
      '#type' => 'checkbox',
      '#title' => 'Use this Builder for Field',
      '#default_value' => 1
    );
    $form['actions'] = array(
      '#type' => 'action',
    );
    $form['actions']['submit'] = array(
      '#value' => t('Submit'),
      '#type' => 'submit',
      '#ajax' => array(
        'callback' => '::modal',
      ),
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (!$form_state->getValue('title')  ) {
      $form_state->setErrorByName('title', 'Please enter title for buider block.');
    }
  }

  /**
   * {@inheritdoc}
   * Submit handle for adding Element
   */
  public function submitForm(array &$form, FormStateInterface $form_state){
    $errors = array();
    if (!$form_state->getValue('title')  ) {
      $errors[] ='Please enter title for buider block.';
    }
    if($errors){

    }else{
      $values = $form_state->getValues();
      $pid = $builder = \Drupal::database()->insert("gavias_content_builder")
        ->fields(array(
          'title'         => $form['title']['#value'],
          'machine_name'  => $form['machine_name']['#value'],
          'use_field'     => $form['use_field']['#value'],
          'params'        => '',
        ))
        ->execute();
    }

    $form_state->setValue('pid', $pid);
    $form_state->setValue('machine_name', $form['machine_name']['#value']);
    $form_state->setValue('use_field', $form['use_field']['#value']);
    $form_state->setValue('errors', $errors);
  }

  public function getFormArgs($form_state){
    $args = array();
    $build_info = $form_state->getBuildInfo();
    if (!empty($build_info['args'])) {
        $args = array_shift($build_info['args']);
    }
    return $args;
  }

  /**
   * AJAX callback handler for Add Element Form.
   */
  public function modal(&$form, FormStateInterface $form_state){
    $values = $form_state->getValues();
    $errors = array();
   
    if (!$form_state->getValue('title')  ) {
      $errors[] ='Please enter title for buider block.';
    }

    if (!empty($errors)) {
      $form_state->clearErrors();
      drupal_get_messages('error'); // clear next message session;
      $content = '<div class="messages messages--error" aria-label="Error message" role="contentinfo"><div role="alert"><ul>';
      foreach ($errors as $name => $error) {
          $response = new AjaxResponse();
          $content .= "<li>$error</li>";
      }
      $content .= '</ul></div></div>';
      $data = array(
          '#markup' => $content,
      );
      $data['#attached']['library'][] = 'core/drupal.dialog.ajax';
      $data['#attached']['library'][] = 'core/drupal.dialog';
      $response->addCommand(new HtmlCommand('#builder-dialog-messages', $content));
      return $response;
    }
    return $this->dialog($values);
  }

  protected function dialog($values = array()){

    $pid = $values['pid'];
    $title = $values['title'];
    $machine_name = $values['machine_name'];
    $random = $values['random'];
    $element = isset($values['element']) ? $values['element'] : array();
    $response = new AjaxResponse();

    $content['#attached']['library'][] = 'core/drupal.dialog.ajax';
    
    $content['#attached']['library'][] = 'core/drupal.dialog';
    
    $response->addCommand(new CloseDialogCommand('.ui-dialog-content'));
    
    $response->addCommand(new InvokeCommand('.field--type-gavias-content-builder .gva-choose-gbb.gva-id-'.$random . ' span', 'removeClass', array('active')));

    $html = '';
    $html .= '<span class="gbb-item active id-'.$pid.'">';
    $html .= '<a class="select" data-id="'.$pid.'" title="'. $machine_name .'">' . $title  . '</a>';
    $html .= ' <span class="action">( <a class="edit gva-popup-iframe" href="'.Url::fromRoute('gavias_content_builder.admin.edit', array('bid'=>$pid, 'gva_iframe'=>'on'))->toString().'" title="'. $machine_name .'">Edit</a>';
    $html .= ' | <a>Please save and refesh if you want duplicate</a>) </span>';
    $html .= '</span>';

    $response->addCommand(new InvokeCommand('.field--type-gavias-content-builder .gva-choose-gbb', 'append', array($html)));
    
    $response->addCommand(new InvokeCommand('.field_gavias_content_builder.gva-id-'.$random, 'val', array($pid)));

    // quick edit compatible.
    $response->addCommand(new InvokeCommand('.quickedit-toolbar .action-save', 'attr', array('aria-hidden', false)));

    $response->setAttachments($content['#attached']);

    return $response;
    }

}