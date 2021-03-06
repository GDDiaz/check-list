<?php

/**
 * StandardTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class StandardTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return StandardTable The table instance
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Standard');
    }

    /**
     * @param $templateId
     * @param bool $criterionToExclude
     * @return mixed
     */
    public static function sumWeightByCheckList($templateId, $criterionToExclude = false)
    {
        $query = Doctrine_Query::create()->select('c.id, SUM(c.weight) as total')->from('Standard c')->where('c.template_id = ?',
            $templateId);

        if ($criterionToExclude)
        {
            $query->andWhereNotIn('c.id', [$criterionToExclude]);
        }

        return $query->fetchOne()->getTotal();
    }
}