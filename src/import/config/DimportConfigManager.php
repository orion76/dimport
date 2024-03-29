<?php

namespace Drupal\dimport\import\config;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the Dimport config plugin manager.
 */
class DimportConfigManager extends DefaultPluginManager {


  /**
   * Constructs a new DimportConfigManager object.
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
    parent::__construct('Plugin/dimport_config', $namespaces, $module_handler, 'Drupal\dimport\import\config\DimportConfigInterface', 'Drupal\dimport\Annotation\DimportConfig');

    $this->alterInfo('dimport_config_info');
    $this->setCacheBackend($cache_backend, 'dimport_config_plugins');
  }

}
