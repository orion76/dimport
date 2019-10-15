<?php

namespace Drupal\dimport_config\Entity;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Bundle entity.
 *
 * @ConfigEntityType(
 *   id = "dimport_bundle",
 *   label = @Translation("Bundle"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\dimport_config\DimportBundleListBuilder",
 *     "form" = {
 *       "add" = "Drupal\dimport_config\Form\DimportBundleForm",
 *       "edit" = "Drupal\dimport_config\Form\DimportBundleForm",
 *       "delete" = "Drupal\dimport_config\Form\DimportBundleDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\dimport_config\DimportBundleHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "dimport_bundle",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/dimport/dimport_bundle/{dimport_bundle}",
 *     "add-form" = "/admin/structure/dimport/dimport_bundle/add",
 *     "edit-form" = "/admin/structure/dimport/dimport_bundle/{dimport_bundle}/edit",
 *     "delete-form" = "/admin/structure/dimport/dimport_bundle/{dimport_bundle}/delete",
 *     "collection" = "/admin/structure/dimport/dimport_bundle"
 *   }
 * )
 */
class DimportBundle extends ConfigEntityBase implements DimportBundleInterface {

  /**
   * The Bundle ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Bundle label.
   *
   * @var string
   */
  protected $label;

}
