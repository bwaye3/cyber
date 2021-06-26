<?php

/**
 * Plugin implementation of the 'Gavias Content Builder' formatter.
 *
 * @FieldFormatter(
 *   id = "gavias_content_builder_formatter",
 *   label = @Translation("Gavias Content Builder"),
 *   field_types = {
 *     "gavias_content_builder"
 *   }
 * )
 */

namespace Drupal\gavias_content_builder\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Url;
class GaviasContentBuilderFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();
    foreach ($items as $delta => $item) {
      $bid = !empty($item->bid) ? $item->bid : 0;
      $content = '';
      if($bid){
        $results = gavias_content_builder_load($bid);
        if(!$results){
          $content = t('No block builder selected');
        }else{
          $user = \Drupal::currentUser();
          $url = \Drupal::request()->getRequestUri();
          $edit_url = '';
          if($user->hasPermission('administer gavias_content_builder')){
            $edit_url = Url::fromRoute('gavias_content_builder.admin.edit', array('bid' => $bid, 'destination' =>  $url))->toString();
          }

          $content .= '<div class="gavias-builder--content">';
          if($edit_url){
            $content .= '<a class="link-edit-blockbuider" href="'. $edit_url .'"> Config block builder </a>';
          }

          $content .= gavias_content_builder_frontend($results->params);
          $content .= '</div>'; 
        }
      }
      $elements[$delta] = array(
        '#type' => 'markup',
        '#id' => $bid,
        '#theme' => 'builder',
        '#content' => $content,
        '#cache' => array(
          'max-age' => 0,
        ),
      );
    }
    return $elements;
  }
}