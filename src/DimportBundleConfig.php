<?php

namespace Drupal\dimport;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Config\ImmutableConfig;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\dimport\Exceptions\DimportConfigSourceException;

/**
 * Class DimportService.
 */
class DimportBundleConfig implements DimportBundleConfigInterface {

  use StringTranslationTrait;

  const QUEUE_ID = 'dimport_queue';

  /** @var string */
  protected $config;

  protected $key;

  protected $current;

  /** @var array */
  protected $importConfigs;


  /** @var array */
  protected $configImport;

  protected $configQueue;

  protected $configBundle;

  protected $configSource;

  public function __construct($bundleId, ConfigFactoryInterface $config_factory) {

    $this->configBundle = $config_factory->get($bundleId);
    $this->configSource = $config_factory->get($this->configBundle->get('source'));

    $this->importConfigs = $this->getImportConfigs();

  }

  public function getQueue() {
    if (!isset($this->configQueue)) {
      $this->configQueue = $this->createQueueConfig(self::QUEUE_ID, $this->configSource->get('plugins'), $this->configBundle->get('plugins'));
    }
    return $this->configQueue;
  }

  public function getImport() {
    if (!isset($this->configImport)) {
      $this->configImport = $this->createPluginConfigs($this->importConfigs, $this->configSource->get('plugins'), $this->configBundle->get('plugins'));
    }
    return $this->configImport;
  }


  protected function createQueueConfig($queue_id, ImmutableConfig $sourcePlugins, ImmutableConfig $bundlePlugins) {

    $bundleConfig = $bundlePlugins->get('id');
    $default = $bundleConfig->get('default');
    if ($default) {
      $bundleConfig = $sourcePlugins->get($queue_id);
    }
    return $bundleConfig;
  }

  protected function createPluginConfigs(array $ids, ImmutableConfig $sourcePlugins, ImmutableConfig $bundlePlugins) {
    $configs = [];
    foreach ($ids as $key => $id) {
      $bundleConfig = $bundlePlugins->get('id');
      $default = $bundleConfig->get('default');
      if ($default) {
        $configs[$key] = $sourcePlugins->get($id);
      }
      else {
        $configs[$key] = $bundleConfig;
      }
    }

    return $configs;
  }

  private function findPluginConfig($plugin_type, $configs) {
    $result = NULL;
    foreach ($configs as $config) {
      /** @var $config ImmutableConfig */
      if ($config->get('plugin_type') === $plugin_type) {
        $result = $config;
        break;
      }
    }
    return $result;
  }

  /**
   * @throws \Drupal\dimport\Exceptions\DimportConfigSourceException
   */
  protected function getImportConfigs() {
    $sourcePlugins = $this->configSource->get('plugins');
    $bundlePlugins = $this->configBundle->get('plugins');

    $configs = [];
    foreach ($bundlePlugins as $item) {
      /** @var $item ImmutableConfig */
      $plugin = NULL;
      if ($item->get('default')) {
        $default = $this->findPluginConfig($item->get('plugin_type'), $sourcePlugins);
        if (empty($default)) {
          $message = $this->t('Import plugin config missing in source config');
          throw new DimportConfigSourceException($this->configSource->get('id'), $message);
        }
        $plugin = $default;
      }
      else {
        $plugin = $item;
      }
      $configs[] = ['plugin' => $plugin];
    }
    $configs = $this->setImportConfigWeight($configs);
    return $configs;
  }

  /**
   * @param array $configs
   *
   * @return array
   * @throws \Drupal\dimport\Exceptions\DimportConfigSourceException
   */
  private function setImportConfigWeight(array $configs) {
    $result = [];

    $weight = 0;
    $dependencies = [];


    $next = $configs;
    $count_prev = count($next);
    $not_resolved = [];

    while (!empty($next)) {
      foreach ($next as $item) {
        /** @var $item ImmutableConfig */
        if ($this->dependenceResolved($item->get('dependencies'), $dependencies)) {
          $dependencies[$item->get('plugin_type')] = TRUE;
          $item->set('weight', ++$weight);
          $result[] = $item;
        }
        else {
          $not_resolved[] = $item;
        }
      }

      if ($count_prev > count($not_resolved)) {
        $next = $not_resolved;
        $count_prev = count($next);
      }
      else {
        $message = $this->t('Dependencies not resolved: @dependencies', ['@dependencies' => implode(', ', $not_resolved)]);
        throw new DimportConfigSourceException($this->configSource->get('id'), $message);
      }

    }
    return $result;

  }

  private function dependenceResolved($dependencies, $dependencies_exist) {
    $resolved = TRUE;
    foreach ($dependencies as $dependency) {
      if (!isset($dependencies_exist[$dependency])) {
        $resolved = FALSE;
        break;
      }

    }
    return $resolved;
  }

  /**
   * Move forward to next element
   *
   * @link https://php.net/manual/en/iterator.next.php
   * @return void Any returned value is ignored.
   * @since 5.0.0
   */
  public function next() {
    $this->key++;


  }

  /**
   * Return the key of the current element
   *
   * @link https://php.net/manual/en/iterator.key.php
   * @return mixed scalar on success, or null on failure.
   * @since 5.0.0
   */
  public function key() {
    return $this->key;
  }

  /**
   * Checks if current position is valid
   *
   * @link https://php.net/manual/en/iterator.valid.php
   * @return bool The return value will be casted to boolean and then evaluated.
   * Returns true on success or false on failure.
   * @since 5.0.0
   */
  public function valid() {
    return isset($this->current);
  }

  /**
   * Rewind the Iterator to the first element
   *
   * @link https://php.net/manual/en/iterator.rewind.php
   * @return void Any returned value is ignored.
   * @since 5.0.0
   */
  public function rewind() {
    $this->key = 0;
  }
}
