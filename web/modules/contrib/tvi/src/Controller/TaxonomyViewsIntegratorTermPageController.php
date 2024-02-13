<?php

namespace Drupal\tvi\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\tvi\Service\TaxonomyViewsIntegratorManager;
use Drupal\tvi\Service\TaxonomyViewsIntegratorManagerInterface;
use Drupal\taxonomy\TermInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Render views for taxonomy term pages.
 */
class TaxonomyViewsIntegratorTermPageController extends ControllerBase {

  /**
   * TVI Term display manager service.
   *
   * @var TaxonomyViewsIntegratorManager
   */
  private $termDisplayManager;

  /**
   * TaxonomyViewsIntegratorTermPageController constructor.
   *
   * @param TaxonomyViewsIntegratorManagerInterface $term_display_manager
   *   TVI Term display manager service.
   */
  public function __construct(TaxonomyViewsIntegratorManagerInterface $term_display_manager) {
    $this->termDisplayManager = $term_display_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static($container->get('tvi.tvi_manager'));
  }

  /**
   * Render the page for a given term.
   *
   * @param TermInterface $taxonomy_term
   *   The term to render the view for.
   *
   * @return array
   *   Views results render array.
   */
  public function render(TermInterface $taxonomy_term) {
    return $this->termDisplayManager->getTaxonomyTermView($taxonomy_term);
  }

}
