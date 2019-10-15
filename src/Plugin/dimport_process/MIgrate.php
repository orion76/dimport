<?php

namespace Drupal\dimport\Plugin\dimport_config;

use Drupal\Core\Annotation\Translation;
use Drupal\dimport\Annotation\DimportProcess;
use Drupal\dimport\import\process\DimportProcessPlugin;

/**
 * Class Migrate
 * @DimportProcess(
 *   id = "migrate",
 *   title = @Translation("Migrate")
 * )
 */
class Migrate extends DimportProcessPlugin {

}
