<?php


namespace Drupal\dimport;


class QueueItem implements QueueItemInterface {

  protected $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function getId() {
    return $this->data->item_id;
  }

  public function getData() {
    return $this->data->data;
  }

  public function getCreated() {
    return $this->data->created;
  }
}
