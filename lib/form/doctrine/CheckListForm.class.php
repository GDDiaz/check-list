<?php

/**
 * CheckList form.
 *
 * @package    check-list
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
class CheckListForm extends BaseCheckListForm
{
  public function configure()
  {
    $this->widgetSchema['name'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control'));
    $this->widgetSchema['descriptor'] = new sfWidgetFormTextarea(array(), array( 'class' => 'form-control'));
    $this->widgetSchema['prefix'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control'));
    $this->widgetSchema['threshold'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control'));
    $this->widgetSchema['status'] = new sfWidgetFormTextarea(array(), array( 'class' => 'form-control'));

    $this->useFields(['name', 'descriptor', 'prefix', 'threshold', 'status']);
  }
}
