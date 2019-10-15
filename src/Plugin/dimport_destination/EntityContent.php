<?php

namespace Drupal\dimport\Plugin\dimport_destination;


use Drupal\Core\Annotation\Translation;
use Drupal\dimport\Annotation\DimportDestination;
use Drupal\dimport\import\destination\DimportDestinationPlugin;

/**
 * Class EntityContent
 * @DimportDestination(
 *   id = "entity_content",
 *   title = @Translation("Entity Content")
 * )
 */
class EntityContent extends DimportDestinationPlugin {

}
