<?php

namespace Drupal\dimport\import\queue;

use Drupal\Component\Plugin\PluginBase;
use Drupal\Core\Queue\QueueFactory;
use Drupal\Core\Queue\QueueInterface;
use Drupal\dimport\QueueItemInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Base class for Dimport queue plugins.
 */
abstract class DimportQueuePlugin extends PluginBase implements DimportQueueInterface {

  /** @var QueueInterface */
  protected $queue;

  /** @var QueueItemInterface */
  protected $currentItem;

  protected $queueFactory;

  public function __construct(array $configuration, $plugin_id, $plugin_definition, QueueFactory $queueFactory) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->queueFactory = $queueFactory;
  }


  public function next() {
    $this->currentItem = $this->queue->claimItem();
  }


  /**
   * Return the current element
   *
   * @link https://php.net/manual/en/iterator.current.php
   * @return mixed Can return any type.
   * @since 5.0.0
   */
  public function current() {
    return $this->currentItem;
  }

  /**
   * Return the key of the current element
   *
   * @link https://php.net/manual/en/iterator.key.php
   * @return mixed scalar on success, or null on failure.
   * @since 5.0.0
   */
  public function key() {
    return $this->currentItem->getId();
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
    return isset($this->currentItem);
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
   * Count elements of an object
   *
   * @link https://php.net/manual/en/countable.count.php
   * @return int The custom count as an integer.
   * </p>
   * <p>
   * The return value is cast to an integer.
   * @since 5.1.0
   */
  public function count() {
    return $this->queue->numberOfItems();
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
      $container->get('queue')
    );
  }
}
