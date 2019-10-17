<?php

namespace Drupal\dimport_config;

use Drupal\Core\Entity\Controller\EntityController;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\Routing\AdminHtmlRouteProvider;
use Drupal\dimport_config\Controller\DimportSourceController;
use Symfony\Component\Routing\Route;

/**
 * Provides routes for Source entities.
 *
 * @see Drupal\Core\Entity\Routing\AdminHtmlRouteProvider
 * @see Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider
 */
class DimportSourceHtmlRouteProvider extends AdminHtmlRouteProvider {

  /**
   * {@inheritdoc}
   */
  public function getRoutes(EntityTypeInterface $entity_type) {
    $collection = parent::getRoutes($entity_type);

    // Provide your custom entity routes here.
    return $collection;
  }

  /**
   * Gets the add page route.
   *
   * Built only for entity types that have bundles.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type.
   *
   * @return \Symfony\Component\Routing\Route|null
   *   The generated route, if available.
   */
  protected function getAddPageRoute(EntityTypeInterface $entity_type) {

    $route = new Route($entity_type->getLinkTemplate('add-page'));
    $route->setDefault('_controller', DimportSourceController::class . '::addPage');
    $route->setDefault('_title_callback', EntityController::class . '::addTitle');
    $route->setDefault('entity_type_id', $entity_type->id());
    $route->setRequirement('_entity_create_any_access', $entity_type->id());

    return $route;

  }

  /**
   * Gets the edit-form route.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type.
   *
   * @return \Symfony\Component\Routing\Route|null
   *   The generated route, if available.
   */
  protected function getEditFormRoute(EntityTypeInterface $entity_type) {

    $entity_type_id = $entity_type->id();
    $route = new Route($entity_type->getLinkTemplate('edit-form'));
    // Use the edit form handler, if available, otherwise default.
    $operation = 'default';
    if ($entity_type->getFormClass('edit')) {
      $operation = 'edit';
    }
    $route
      ->setDefaults([
        '_controller' => DimportSourceController::class . '::editForm',
        '_title_callback' => '\Drupal\Core\Entity\Controller\EntityController::editTitle',
      ])
      ->setRequirement('_entity_access', "{$entity_type_id}.update")
      ->setOption('parameters', [
        $entity_type_id => ['type' => 'entity:' . $entity_type_id],
      ]);

    // Entity types with serial IDs can specify this in their route
    // requirements, improving the matching process.
    if ($this->getEntityTypeIdKeyType($entity_type) === 'integer') {
      $route->setRequirement($entity_type_id, '\d+');
    }
    return $route;
  }

  /**
   * Gets the canonical route.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type.
   *
   * @return \Symfony\Component\Routing\Route|null
   *   The generated route, if available.
   */
  protected function getCanonicalRoute(EntityTypeInterface $entity_type) {

    $entity_type_id = $entity_type->id();
    $route = new Route($entity_type->getLinkTemplate('canonical'));
    $route
      ->addDefaults([
        '_controller' => DimportSourceController::class . '::view',
        '_title_callback' => '\Drupal\Core\Entity\Controller\EntityController::title',
      ])
      ->setRequirement('_entity_access', "{$entity_type_id}.view")
      ->setOption('parameters', [
        $entity_type_id => ['type' => 'entity:' . $entity_type_id],
      ]);

    // Entity types with serial IDs can specify this in their route
    // requirements, improving the matching process.
    if ($this->getEntityTypeIdKeyType($entity_type) === 'integer') {
      $route->setRequirement($entity_type_id, '\d+');
    }
    return $route;

  }

}
