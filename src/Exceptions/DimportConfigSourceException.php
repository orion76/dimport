<?php

namespace Drupal\dimport\Exceptions;

use Exception;
use Throwable;

class DimportConfigSourceException extends Exception {

  protected $sourceId;

  public function __construct($sourceId, $message = "", $code = 0, Throwable $previous = NULL) {
    $this->sourceId = $sourceId;
    parent::__construct($message, $code, $previous);
  }

  public function getSourceId() {
    return $this->sourceId;
  }
}
