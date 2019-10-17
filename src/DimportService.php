<?php

namespace Drupal\dimport;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\dimport\import\config\DimportConfigPlugin;
use Drupal\dimport\import\destination\DimportDestinationPlugin;
use Drupal\dimport\import\fetcher\DimportFetcherPlugin;
use Drupal\dimport\import\parser\DimportParserPlugin;
use Drupal\dimport\import\process\DimportProcessPlugin;
use Drupal\dimport\import\queue\DimportQueuePlugin;

/**
 * Class DimportService.
 */
class DimportService implements DimportServiceInterface {


  /**
   * @var DimportConfigPlugin $configPlugin
   */
  protected $configPlugin;

  /**
   * @var DimportFetcherPlugin $fetcherPlugin
   */
  protected $fetcherPlugin;

  /**
   * @var DimportParserPlugin $parserPlugin
   */
  protected $parserPlugin;

  /**
   * @var DimportProcessPlugin $processPlugin
   */
  protected $processPlugin;

  /**
   * @var DimportQueuePlugin $queuePlugin
   */
  protected $queuePlugin;

  /**
   * @var DimportDestinationPlugin $destinationPlugin
   */
  protected $destinationPlugin;

  protected $configFactory;

  /**
   * Constructs a new DimportService object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->configFactory = $config_factory;
  }

  public function execute($bundleId) {
    $config = new DimportBundleConfig($bundleId, $this->configFactory);
//    $
//    foreach ($plugins as $plugin) {
//
//    }
  }

  protected function createImportPlugin($id, $configuration) {

  }

  protected function createQueuePlugin($id, $configuration) {

  }

  protected function executeProcess(DimportPluginInterface $plugin) {
    foreach ($plugin as $item) {

    }
  }


}
