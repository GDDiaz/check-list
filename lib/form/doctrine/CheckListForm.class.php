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
    $this->widgetSchema['observations'] = new sfWidgetFormTextarea(array(), array( 'class' => 'form-control'));
    $this->widgetSchema['reference']        = new sfWidgetFormInputText(array(), array( 'class' => 'form-control'));
    $this->widgetSchema['template_id']       = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Template'), 'add_empty' => false), array( 'class' => 'form-control'));
    $this->widgetSchema['responsible_id']    = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Responsible'), 'add_empty' => false), array( 'class' => 'form-control'));
    $this->widgetSchema['original_threshold'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control'));

      $this->widgetSchema['status'] = new sfWidgetFormChoice(
          array(
              'choices' => array(1 => 'Activo', 0 => 'Inactivo'),
          ), array( 'class' => 'form-control'));

    $this->useFields(['name','reference', 'observations', 'template_id', 'responsible_id', 'original_threshold', 'status']);
  }
}
