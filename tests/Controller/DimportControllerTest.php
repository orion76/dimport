<?php

namespace Drupal\dimport\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the dimport module.
 */
class DimportControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "dimport DimportController's controller functionality",
      'description' => 'Test Unit for module dimport and controller DimportController.',
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
   * Tests dimport functionality.
   */
  public function testDimportController() {
    // Check that the basic functions of module dimport.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
