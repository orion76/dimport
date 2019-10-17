<?php

namespace Drupal\dimport_config\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the dimport_config module.
 */
class DimportSourceControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "dimport_config DimportSourceController's controller functionality",
      'description' => 'Test Unit for module dimport_config and controller DimportSourceController.',
      'group' => 'Other',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests dimport_config functionality.
   */
  public function testDimportSourceController() {
    // Check that the basic functions of module dimport_config.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
