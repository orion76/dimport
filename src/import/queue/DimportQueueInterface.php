<?php

namespace Drupal\dimport\import\queue;

use Countable;
use Drupal\Component\Plugin\PluginInspectionInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Iterator;

/**
 * Defines an interface for Dimport queue plugins.
 */
interface DimportQueueInterface extends PluginInspectionInterface, Iterator, Countable, ContainerFactoryPluginInterface {



}
