<?php

/**
 * CheckedStandard form base class.
 *
 * @method CheckedStandard getObject() Returns the current form's model object
 *
 * @package    check-list
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseCheckedStandardForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInputText(),
      'description'     => new sfWidgetFormTextarea(),
      'standard_type'   => new sfWidgetFormInputText(),
      'checklist_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CheckList'), 'add_empty' => false)),
      'final_weight'    => new sfWidgetFormInputText(),
      'option_selected' => new sfWidgetFormInputText(),
      'assigned_value'  => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 255)),
      'description'     => new sfValidatorString(array('required' => false)),
      'standard_type'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'checklist_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CheckList'), 'column' => 'id')),
      'final_weight'    => new sfValidatorPass(array('required' => false)),
      'option_selected' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'assigned_value'  => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('checked_standard[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CheckedStandard';
  }

}
