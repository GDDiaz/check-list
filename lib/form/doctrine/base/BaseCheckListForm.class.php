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
      'id'                 => new sfWidgetFormInputHidden(),
      'name'               => new sfWidgetFormInputText(),
      'observations'       => new sfWidgetFormTextarea(),
      'reference'          => new sfWidgetFormInputText(),
      'template_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Template'), 'add_empty' => false)),
      'responsible_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Responsible'), 'add_empty' => false)),
      'original_threshold' => new sfWidgetFormInputText(),
      'assessment'         => new sfWidgetFormInputText(),
      'status'             => new sfWidgetFormInputCheckbox(),
      'version_at'         => new sfWidgetFormDateTime(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'               => new sfValidatorString(array('max_length' => 255)),
      'observations'       => new sfValidatorString(array('required' => false)),
      'reference'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'template_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Template'), 'column' => 'id')),
      'responsible_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Responsible'), 'column' => 'id')),
      'original_threshold' => new sfValidatorInteger(),
      'assessment'         => new sfValidatorNumber(array('required' => false)),
      'status'             => new sfValidatorBoolean(array('required' => false)),
      'version_at'         => new sfValidatorDateTime(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
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
