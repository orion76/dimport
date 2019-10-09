<?php

namespace Drupal\dimport\import\parser;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the Dimport parser plugin manager.
 */
class DimportParserManager extends DefaultPluginManager {


  /**
   * Constructs a new DimportParserManager object.
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
    parent::__construct('Plugin/dimport_parser', $namespaces, $module_handler, 'Drupal\dimport\import\parser\DimportParserInterface', 'Drupal\dimport\Annotation\DimportParser');

    $this->alterInfo('dimport_parser_info');
    $this->setCacheBackend($cache_backend, 'dimport_parser_plugins');
  }

}
