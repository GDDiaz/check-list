<?php

/**
 * Criteria form.
 *
 * @package    check-list
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
class CheckedStandardForm extends BaseCheckedStandardForm
{
  public function configure()
  {
      $this->widgetSchema['option_selected'] = new sfWidgetFormChoice(
          array( 'multiple' => false,
                 'expanded' => false,
                 'choices' => array('n.a' => 'No aplica', 'done' => 'Finalizado', 'pending' => 'Pendiente')),
          array( 'class' => 'form-control'));
      $this->widgetSchema['option_selected']->setLabel($this->getObject()->getName());
      $this->useFields(['option_selected']);

  }
}
