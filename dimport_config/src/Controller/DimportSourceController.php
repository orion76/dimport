<?php

namespace Drupal\dimport_config\Controller;

use Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException;
use Drupal\Component\Plugin\Exception\PluginNotFoundException;
use Drupal\Core\Controller\ControllerBase;

/**
 * Class DimportSourceController.
 */
class DimportSourceController extends ControllerBase {


  private function createSourceView() {
    return ['#type' => 'markup', '#markup' => 'WWWWWWWWWW'];
  }

  /**
   * Source Add.
   *
   * @return array
   */
  public function view($args = NULL) {
    $page = ['#type' => 'container'];
    $page['view'] = $this->createSourceView();
    return $page;
  }


  /**
   * Source Edit.
   *
   * @return array
   */
  public function editForm() {
    $page = ['#type' => 'container'];

    $current_route = \Drupal::routeMatch();
    $entity = $current_route->getParameters()->get('dimport_source');

    $page['form'] = $this->entityFormBuilder()->getForm($entity, 'edit');;

    $page['plugins'] = $this->entityTypeManager()->getListBuilder('dimport_bundle')->render();
    return $page;
  }

  /**
   * Source Add.
   *
   * @return array
   */
  public function addPage() {
    $page = ['#type' => 'container'];

    $entity = $this->entityTypeManager()->getStorage('dimport_source')->create();

    $page['form'] = $this->entityFormBuilder()->getForm($entity, 'add');
    return $page;
  }

}
