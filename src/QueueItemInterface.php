<?php


namespace Drupal\dimport;


interface QueueItemInterface {

  public function getId();

  public function getData();

  public function getCreated();
}
