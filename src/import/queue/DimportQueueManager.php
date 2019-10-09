<?php

namespace Drupal\dimport\import\queue;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the Dimport queue plugin manager.
 */
class DimportQueueManager extends DefaultPluginManager {


  /**
   * Constructs a new DimportQueueManager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/dimport_queue', $namespaces, $module_handler, 'Drupal\dimport\import\queue\DimportQueueInterface', 'Drupal\dimport\Annotation\DimportQueue');

    $this->alterInfo('dimport_queue_info');
    $this->setCacheBackend($cache_backend, 'dimport_queue_plugins');
  }

}
