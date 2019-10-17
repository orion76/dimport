<?php

namespace Drupal\dimport\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a dimport Fetcher item annotation object.
 *
 * @see \Drupal\dimport\Annotation\DimportFetcherManager
 * @see plugin_api
 *
 * @Annotation
 */
class DimportFetcher extends Plugin {


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
