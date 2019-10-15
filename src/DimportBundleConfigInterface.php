<?php


namespace Drupal\dimport;


use Iterator;

interface DimportBundleConfigInterface {

  public function getQueue();

  public function getImport();
}
