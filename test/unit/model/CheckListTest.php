<?php
include dirname(__FILE__) . '/../../bootstrap/doctrine.php';
/**
 * Created by PhpStorm.
 * User: Gaviria
 * Date: 12/09/2019
 * Time: 11:41 AM
 */

class CheckListTest extends PHPUnit_Framework_TestCase
{
  private $object;

  protected function setUp()
  {
    $this->object = new CheckList();
  }

  protected function tearDown()
  {
    $this->object = null;
  }

  public function testGetNameWithPrefix()
  {
    $result = $this->object->getCheckListById(2)
      ->getNameWithPrefix();

    $this->assertEquals(
      'LDC 1-Lista de chequeo', $result);
  }

  public function testGetActiveCheckListInArray()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
      'This test has not been implemented yet.'
    );
  }

  public function testGetInactiveCheckListInArray()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
      'This test has not been implemented yet.'
    );
  }

  public function testHasCriteria()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
      'This test has not been implemented yet.'
    );
  }

  public function testGetAllCriteriasByCheckListId()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
      'This test has not been implemented yet.'
    );
  }

}
