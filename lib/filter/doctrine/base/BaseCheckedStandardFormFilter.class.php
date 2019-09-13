<?php

/**
 * CheckedStandard filter form base class.
 *
 * @package    check-list
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseCheckedStandardFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'     => new sfWidgetFormFilterInput(),
      'standard_type'   => new sfWidgetFormFilterInput(),
      'checklist_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CheckList'), 'add_empty' => true)),
      'final_weight'    => new sfWidgetFormFilterInput(),
      'option_selected' => new sfWidgetFormFilterInput(),
      'assigned_value'  => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'description'     => new sfValidatorPass(array('required' => false)),
      'standard_type'   => new sfValidatorPass(array('required' => false)),
      'checklist_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CheckList'), 'column' => 'id')),
      'final_weight'    => new sfValidatorPass(array('required' => false)),
      'option_selected' => new sfValidatorPass(array('required' => false)),
      'assigned_value'  => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('checked_standard_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CheckedStandard';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'name'            => 'Text',
      'description'     => 'Text',
      'standard_type'   => 'Text',
      'checklist_id'    => 'ForeignKey',
      'final_weight'    => 'Text',
      'option_selected' => 'Text',
      'assigned_value'  => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
