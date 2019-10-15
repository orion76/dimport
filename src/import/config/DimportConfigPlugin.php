<?php

namespace Drupal\dimport\import\config;

use Drupal\Component\Plugin\PluginBase;
use Drupal\dimport\DimportPluginInterface;

/**
 * Base class for Dimport config plugins.
 */
abstract class DimportConfigPlugin extends PluginBase implements DimportConfigInterface {


  abstract function getData();

}
