<?php

namespace Drupal\dimport\import\process;

use Drupal\Component\Plugin\PluginBase;

/**
 * Base class for Dimport process plugins.
 */
abstract class DimportProcessPlugin extends PluginBase implements DimportProcessInterface {


  abstract function getData();

}
