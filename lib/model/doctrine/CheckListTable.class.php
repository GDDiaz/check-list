<?php

/**
 * CheckListTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CheckListTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return CheckListTable The table instance
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('CheckList');
  }

  /**
   * @param $checkListId
   * @param int $hydrationMode
   * @return Doctrine_Collection
   * @throws Doctrine_Query_Exception
   */
  public function getCheckListById($checkListId)
  {
    $query = Doctrine_Query::create()
      ->from('CheckList cl')
      ->where('cl.id = ?', $checkListId);

    return $query->fetchOne();
  }

  /**
   * @param int $hydrationMode
   * @return Doctrine_Collection
   * @throws Doctrine_Query_Exception
   */
  public function getActiveCheckList($hydrationMode = 2)
  {
    $query = Doctrine_Query::create()
      ->from('CheckList cl')
      ->where('cl.status LIKE Active');

    return $query->execute(null, $hydrationMode);
  }

  /**
   * @param int $hydrationMode
   * @return Doctrine_Collection
   * @throws Doctrine_Query_Exception
   */
  public function getInactiveCheckList($hydrationMode = 2)
  {
    $query = Doctrine_Query::create()
      ->from('CheckList cl')
      ->where('cl.status LIKE ?', 'Active');

    return $query->execute(null, $hydrationMode);
  }

  /**
   * @param $checkListId
   * @param int $hydrationMode
   * @return Doctrine_Collection
   * @throws Doctrine_Query_Exception
   */
  public function getAllCriteriasByCheckList($checkListId, $hydrationMode = 2)
  {
    $query = Doctrine_Query::create()
      ->from('CheckedStandard c')
      ->where('c.check_list_id = ?', 3);

    return $query->fetchOne(null, $hydrationMode);
  }
}
