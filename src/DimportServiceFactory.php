<?php

namespace Drupal\dimport;

use Drupal\Component\Plugin\Exception\PluginException;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Class DimportService.
 */
class DimportServiceFactory {

  protected $configFactory;

  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->configFactory = $config_factory;
  }


}
