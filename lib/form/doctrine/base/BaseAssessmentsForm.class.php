<?php

/**
 * Assessments form base class.
 *
 * @method Assessments getObject() Returns the current form's model object
 *
 * @package    check-list
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseAssessmentsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'checklist_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CheckList'), 'add_empty' => false)),
      'reference'    => new sfWidgetFormInputText(),
      'day'          => new sfWidgetFormInputText(),
      'month'        => new sfWidgetFormInputText(),
      'year'         => new sfWidgetFormInputText(),
      'day_of_week'  => new sfWidgetFormTextarea(),
      'version_at'   => new sfWidgetFormDateTime(),
      'value'        => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'checklist_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CheckList'), 'column' => 'id')),
      'reference'    => new sfValidatorString(array('max_length' => 255)),
      'day'          => new sfValidatorPass(array('required' => false)),
      'month'        => new sfValidatorPass(array('required' => false)),
      'year'         => new sfValidatorPass(array('required' => false)),
      'day_of_week'  => new sfValidatorString(array('required' => false)),
      'version_at'   => new sfValidatorDateTime(),
      'value'        => new sfValidatorPass(),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('assessments[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Assessments';
  }

}
