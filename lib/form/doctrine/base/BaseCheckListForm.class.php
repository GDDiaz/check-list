<?php

/**
 * CheckList form base class.
 *
 * @method CheckList getObject() Returns the current form's model object
 *
 * @package    check-list
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseCheckListForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'descriptor' => new sfWidgetFormTextarea(),
      'prefix'     => new sfWidgetFormInputText(),
      'threshold'  => new sfWidgetFormInputText(),
      'status'     => new sfWidgetFormTextarea(),
      'versionAt'  => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'descriptor' => new sfValidatorString(array('required' => false)),
      'prefix'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'threshold'  => new sfValidatorInteger(),
      'status'     => new sfValidatorString(),
      'versionAt'  => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('check_list[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CheckList';
  }

}
