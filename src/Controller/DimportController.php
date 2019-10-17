<?php

namespace Drupal\dimport\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DimportController.
 */
class DimportController extends ControllerBase {

  /**
   * Hello.
   *
   * @return array
   *   Return Hello string.
   */
  public function pageRoot() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: hello')
    ];
  }

}
