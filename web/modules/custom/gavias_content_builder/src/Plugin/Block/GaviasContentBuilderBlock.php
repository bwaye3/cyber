<?php

/**
 * @file
 * Contains \Drupal\gavias_content_builder\Plugin\Block\GaviasContentBuilderBlock.
 */

namespace Drupal\gavias_content_builder\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides blocks which belong to Gavias BuilderBlock.
 *
 *
 * @Block(
 *   id = "gavias_content_builder_block",
 *   admin_label = @Translation("Gavias Builder Content"),
 *   category = @Translation("Gavias Builder Content"),
 *   deriver = "Drupal\gavias_content_builder\Plugin\Derivative\GaviasContentBuilderBlock",
 * )
 *
 */

class GaviasContentBuilderBlock extends BlockBase {

  protected $bid;

  /**
   * {@inheritdoc}
   */
  public function build() {
    $bid = $this->getDerivativeId();
    $this->bid = $bid;
     $block = array();
      if (str_replace('gavias_content_builder_block____', '', $bid) != $bid) {
        $bid = str_replace('gavias_content_builder_block____', '', $bid);
        $results = gavias_content_builder_load($bid);
        if(!$results) return 'No block builder selected';
        $content_block = gavias_content_builder_frontend($results->params);
        $user = \Drupal::currentUser();
        $url = \Drupal::request()->getRequestUri();
        $edit_url = '';
        if($user->hasPermission('administer gavias_content_builder')){
          $edit_url = \Drupal::url('gavias_content_builder.admin.edit', array('bid' => $bid, 'destination' =>  $url));
        }
        $block = array(
          '#theme' => 'builder',
          '#content' => $content_block,
          '#edit_url' => $edit_url,
          '#cache' => array('max-age' => 0)
        );
      }

      return $block;
  }
  /**
   *  Default cache is disabled. 
   * 
   * @param array $form
   * @param \Drupal\gavias_content_builder\Plugin\Block\FormStateInterface $form_state
   * @return 
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $rebuild_form = parent::buildConfigurationForm($form, $form_state);
    $rebuild_form['cache']['max_age']['#default_value'] = 0;
    return $rebuild_form;
  }
}
