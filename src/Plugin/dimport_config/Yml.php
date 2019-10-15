<?php

namespace Drupal\dimport\Plugin\dimport_config;

use Drupal\Core\Annotation\Translation;
use Drupal\dimport\Annotation\DimportConfig;
use Drupal\dimport\import\config\DimportConfigPlugin;

/**
 * Class Yml
 * @DimportConfig(
 *   id = "yml",
 *   title = @Translation("Yml")
 * )
 */
class Yml extends DimportConfigPlugin {

  public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
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
    // TODO: Implement count() method.
  }

  function getData() {
    // TODO: Implement getData() method.
  }

  public function execute($source) {
    // TODO: Implement execute() method.
  }

  public function getQueueId() {
    // TODO: Implement getQueueId() method.
}}
