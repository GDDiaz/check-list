<?php

/**
 * CheckList filter form.
 *
 * @package    check-list
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id$
 */
class CheckListFormFilter extends BaseCheckListFormFilter
{
  public function configure()
  {
      foreach ($this->getWidgetSchema()->getFields() as $field)
      {
          $field->setAttribute('class', 'form-control');
      }
      $this->widgetSchema['created_at']  =  new sfWidgetFormFilterInput(
          array('with_empty' => false),
          array('class' => 'form-control datepicker'));
      sfWidgetFormSchema::setDefaultFormFormatterName('custom');
  }
}
