<?php

/**
 * Template form base class.
 *
 * @method Template getObject() Returns the current form's model object
 *
 * @package    check-list
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseTemplateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormTextarea(),
      'prefix'        => new sfWidgetFormInputText(),
      'threshold'     => new sfWidgetFormInputText(),
      'checklists_qt' => new sfWidgetFormInputText(),
      'status'        => new sfWidgetFormInputCheckbox(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 255)),
      'description'   => new sfValidatorString(array('required' => false)),
      'prefix'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'threshold'     => new sfValidatorInteger(),
      'checklists_qt' => new sfValidatorInteger(array('required' => false)),
      'status'        => new sfValidatorBoolean(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('template[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Template';
  }

}
