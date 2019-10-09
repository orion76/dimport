<?php

namespace Drupal\dimport\import\process;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the Dimport process plugin manager.
 */
class DimportProcessManager extends DefaultPluginManager {


  /**
   * Constructs a new DimportProcessManager object.
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
    parent::__construct('Plugin/dimport_process', $namespaces, $module_handler, 'Drupal\dimport\import\process\DimportProcessInterface', 'Drupal\dimport\Annotation\DimportProcess');

    $this->alterInfo('dimport_process_info');
    $this->setCacheBackend($cache_backend, 'dimport_process_plugins');
  }

}
