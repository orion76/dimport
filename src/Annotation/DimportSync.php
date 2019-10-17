<?php

namespace Drupal\dimport\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Dimport sync item annotation object.
 *
 * @see \Drupal\dimport\Annotation\DimportSyncManager
 * @see plugin_api
 *
 * @Annotation
 */
class DimportSync extends Plugin {


  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
