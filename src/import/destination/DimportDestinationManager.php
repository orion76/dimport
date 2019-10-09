<?php

namespace Drupal\dimport\import\destination;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the Dimport destination plugin manager.
 */
class DimportDestinationManager extends DefaultPluginManager {


  /**
   * Constructs a new DimportDestinationManager object.
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
    parent::__construct('Plugin/dimport_destination', $namespaces, $module_handler, 'Drupal\dimport\import\destination\DimportDestinationInterface', 'Drupal\dimport\Annotation\DimportDestination');

    $this->alterInfo('dimport_destination_info');
    $this->setCacheBackend($cache_backend, 'dimport_destination_plugins');
  }

}
