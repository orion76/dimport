<?php

namespace Drupal\dimport\import\fetcher;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the dimport Fetcher plugin manager.
 */
class DimportFetcherManager extends DefaultPluginManager {


  /**
   * Constructs a new DimportFetcherManager object.
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
    parent::__construct('Plugin/dimport_fetcher', $namespaces, $module_handler, 'Drupal\dimport\import\fetcher\DimportFetcherInterface', 'Drupal\dimport\Annotation\DimportFetcher');

    $this->alterInfo('dimport_fetcher_info');
    $this->setCacheBackend($cache_backend, 'dimport_fetcher_plugins');
  }

}
