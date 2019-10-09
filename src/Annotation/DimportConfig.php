<?php

namespace Drupal\dimport\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Dimport config item annotation object.
 *
 * @see \Drupal\dimport\Plugin\DimportConfigManager
 * @see plugin_api
 *
 * @Annotation
 */
class DimportConfig extends Plugin {


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
