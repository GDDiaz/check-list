<?php
include dirname(__FILE__) . '/../../bootstrap/doctrine.php';
/**
 * Created by PhpStorm.
 * User: Gaviria
 * Date: 11/09/2019
 * Time: 11:03 PM
 */

class CriteriaTest extends PHPUnit_Framework_TestCase
{
  private $object;

  protected function setUp()
  {
    $this->object = new Criteria();
  }

  protected function tearDown()
  {
    $this->object = null;
  }

  public function testSumWeightByCheckList()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
      'This test has not been implemented yet.'
    );
  }
}
