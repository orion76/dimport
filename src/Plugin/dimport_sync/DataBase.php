<?php

namespace Drupal\dimport\Plugin\dimport_fetcher;


use Drupal\Core\Annotation\Translation;
use Drupal\dimport\Annotation\DimportSync;
use Drupal\dimport\import\sync\DimportSyncPlugin;

/**
 * Class DataBase
 * @DimportSync(
 *   id = "data_base",
 *   title = @Translation("Data base")
 * )
 */
class DataBase extends DimportSyncPlugin {

}
