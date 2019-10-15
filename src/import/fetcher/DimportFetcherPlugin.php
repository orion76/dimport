<?php

namespace Drupal\dimport\import\fetcher;

use Drupal\Component\Plugin\PluginBase;

/**
 * Base class for dimport Fetcher plugins.
 */
abstract class DimportFetcherPlugin extends PluginBase implements DimportFetcherInterface {


  abstract function getData();

}
