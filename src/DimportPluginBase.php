<?php


namespace Drupal\dimport;


use Drupal\Component\Plugin\PluginBase;
use function key;
use function reset;

abstract class DimportPluginBase extends PluginBase implements DimportPluginInterface {

  protected $data;

  protected $currentKey;

  protected $currentItem;

  public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  public function getQueueId() {
    return $this->pluginId;
  }

  public function execute($source) {
    $this->data = $this->getData($source);
    $this->next();
  }

  public function count() {
    return count($this->data);
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
   * Move forward to next element
   *
   * @link https://php.net/manual/en/iterator.next.php
   * @return void Any returned value is ignored.
   * @since 5.0.0
   */
  public function next() {
    if (!empty($this->data)) {
      $this->currentItem = reset($this->data);
      $this->currentKey = key($this->data);
      unset($this->data[$this->currentKey]);
    }
    else {
      $this->currentItem = NULL;
    }
  }

  /**
   * Return the key of the current element
   *
   * @link https://php.net/manual/en/iterator.key.php
   * @return mixed scalar on success, or null on failure.
   * @since 5.0.0
   */
  public function key() {
    return $this->currentKey;
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
   * @return \Iterator
   */
  abstract function getData($source);

  /**
   * Gets the plugin_id of the plugin instance.
   *
   * @return string
   *   The plugin_id of the plugin instance.
   */
  public function getPluginId() {
    // TODO: Implement getPluginId() method.
  }

  /**
   * Gets the definition of the plugin implementation.
   *
   * @return array
   *   The plugin definition, as returned by the discovery object used by the
   *   plugin manager.
   */
  public function getPluginDefinition() {
    // TODO: Implement getPluginDefinition() method.
  }
}
