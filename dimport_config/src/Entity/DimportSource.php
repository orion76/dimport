<?php

namespace Drupal\dimport_config\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Source entity.
 *
 * @ConfigEntityType(
 *   id = "dimport_source",
 *   label = @Translation("Source"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\dimport_config\DimportSourceListBuilder",
 *     "form" = {
 *       "add" = "Drupal\dimport_config\Form\DimportSourceForm",
 *       "edit" = "Drupal\dimport_config\Form\DimportSourceForm",
 *       "delete" = "Drupal\dimport_config\Form\DimportSourceDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\dimport_config\DimportSourceHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "dimport_source",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/dimport/dimport_source/{dimport_source}",
 *     "add-form" = "/admin/structure/dimport/dimport_source/add",
 *     "edit-form" = "/admin/structure/dimport/dimport_source/{dimport_source}/edit",
 *     "delete-form" = "/admin/structure/dimport/dimport_source/{dimport_source}/delete",
 *     "collection" = "/admin/structure/dimport/dimport_source"
 *   }
 * )
 */
class DimportSource extends ConfigEntityBase implements DimportSourceInterface {

  /**
   * The Source ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Source label.
   *
   * @var string
   */
  protected $label;

}
