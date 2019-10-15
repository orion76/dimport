<?php

namespace Drupal\dimport\import\parser;

use Drupal\Component\Plugin\PluginBase;

/**
 * Base class for Dimport parser plugins.
 */
abstract class DimportParserPlugin extends PluginBase implements DimportParserInterface {


  abstract function getData();

}
