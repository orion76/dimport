<?php

namespace Drupal\dimport\Plugin\dimport_fetcher;


use Drupal\Core\Annotation\Translation;
use Drupal\dimport\Annotation\DimportFetcher;
use Drupal\dimport\import\fetcher\DimportFetcherPlugin;

/**
 * Class Http
 * @DimportFetcher(
 *   id = "http",
 *   title = @Translation("HTTP")
 * )
 */
class Http extends DimportFetcherPlugin {

}
