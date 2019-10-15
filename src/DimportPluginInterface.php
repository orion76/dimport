<?php


namespace Drupal\dimport;


use Countable;
use Drupal\Component\Plugin\PluginInspectionInterface;
use Iterator;
use Traversable;

interface DimportPluginInterface extends PluginInspectionInterface, Iterator, Countable {

  public function execute($source);

  public function getQueueId();
}
