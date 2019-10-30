<?php

/**
 * Template form.
 *
 * @package    check-list
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
class TemplateForm extends BaseTemplateForm
{
  public function configure()
  {
    foreach ($this->getWidgetSchema()->getFields() as $field)
    {
      $field->setAttribute('class', 'form-control');
    }

    $this->widgetSchema['status'] = new sfWidgetFormChoice(
      array(
        'choices' => array(1 => 'Activo', 0 => 'Inactivo'),
      ), array( 'class' => 'form-control'));

      $this->useFields(['name',
          'description',
          'prefix',
          'threshold',
          'status' ]);

    sfWidgetFormSchema::setDefaultFormFormatterName('custom');
  }
}
