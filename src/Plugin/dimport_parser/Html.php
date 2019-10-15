<?php

namespace Drupal\dimport\Plugin\dimport_fetcher;


use Drupal\Core\Annotation\Translation;
use Drupal\dimport\Annotation\DimportParser;
use Drupal\dimport\import\parser\DimportParserPlugin;

/**
 * Class Html
 * @DimportParser(
 *   id = "html",
 *   title = @Translation("HTML")
 * )
 */
class Html extends DimportParserPlugin {

}
