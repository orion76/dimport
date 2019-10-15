<?php

namespace Drupal\dimport\Plugin\dimport_config;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\dimport\Annotation\DimportQueue;
use Drupal\dimport\import\queue\DimportQueuePlugin;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class DataBase
 * @DimportQueue(
 *   id = "data_base",
 *   title = @Translation("DataBase")
 * )
 */
class DataBase extends DimportQueuePlugin  implements ContainerFactoryPluginInterface{

  private $queue;

  public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  public function getData($source) {
    // TODO: Implement getData() method.
  }

  /**
   * Return the current element
   *
   * @link https://php.net/manual/en/iterator.current.php
   * @return mixed Can return any type.
   * @since 5.0.0
   */
  public function current() {
    // TODO: Implement current() method.
  }

  /**
   * Move forward to next element
   *
   * @link https://php.net/manual/en/iterator.next.php
   * @return void Any returned value is ignored.
   * @since 5.0.0
   */
  public function next() {
    // TODO: Implement next() method.
  }

  /**
   * Return the key of the current element
   *
   * @link https://php.net/manual/en/iterator.key.php
   * @return mixed scalar on success, or null on failure.
   * @since 5.0.0
   */
  public function key() {
    // TODO: Implement key() method.
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
    // TODO: Implement valid() method.
  }

  /**
   * Rewind the Iterator to the first element
   *
   * @link https://php.net/manual/en/iterator.rewind.php
   * @return void Any returned value is ignored.
   * @since 5.0.0
   */
  public function rewind() {
    // TODO: Implement rewind() method.
}

  /**
   * Creates an instance of the plugin.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container to pull out services used in the plugin.
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   *
   * @return static
   *   Returns an instance of this plugin.
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('queue'));
  }
}
