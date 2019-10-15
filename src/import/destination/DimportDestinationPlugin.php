<?php

namespace Drupal\dimport\import\destination;

use Drupal\Component\Plugin\PluginBase;

/**
 * Base class for Dimport destination plugins.
 */
abstract class DimportDestinationPlugin extends PluginBase implements DimportDestinationInterface {


  abstract function getData();

}
