<?php

/**
 * Assessments filter form base class.
 *
 * @package    check-list
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseAssessmentsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'checklist_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CheckList'), 'add_empty' => true)),
      'reference'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'day'          => new sfWidgetFormFilterInput(),
      'month'        => new sfWidgetFormFilterInput(),
      'year'         => new sfWidgetFormFilterInput(),
      'day_of_week'  => new sfWidgetFormFilterInput(),
      'version_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'value'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'checklist_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CheckList'), 'column' => 'id')),
      'reference'    => new sfValidatorPass(array('required' => false)),
      'day'          => new sfValidatorPass(array('required' => false)),
      'month'        => new sfValidatorPass(array('required' => false)),
      'year'         => new sfValidatorPass(array('required' => false)),
      'day_of_week'  => new sfValidatorPass(array('required' => false)),
      'version_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'value'        => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('assessments_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Assessments';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'checklist_id' => 'ForeignKey',
      'reference'    => 'Text',
      'day'          => 'Text',
      'month'        => 'Text',
      'year'         => 'Text',
      'day_of_week'  => 'Text',
      'version_at'   => 'Date',
      'value'        => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
