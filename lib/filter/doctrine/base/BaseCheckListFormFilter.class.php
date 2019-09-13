<?php

/**
 * CheckList filter form base class.
 *
 * @package    check-list
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseCheckListFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'observations'       => new sfWidgetFormFilterInput(),
      'reference'          => new sfWidgetFormFilterInput(),
      'template_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Template'), 'add_empty' => true)),
      'responsible_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Responsible'), 'add_empty' => true)),
      'original_threshold' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'assessment'         => new sfWidgetFormFilterInput(),
      'status'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'version_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'               => new sfValidatorPass(array('required' => false)),
      'observations'       => new sfValidatorPass(array('required' => false)),
      'reference'          => new sfValidatorPass(array('required' => false)),
      'template_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Template'), 'column' => 'id')),
      'responsible_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Responsible'), 'column' => 'id')),
      'original_threshold' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'assessment'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'status'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'version_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('check_list_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CheckList';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'name'               => 'Text',
      'observations'       => 'Text',
      'reference'          => 'Text',
      'template_id'        => 'ForeignKey',
      'responsible_id'     => 'ForeignKey',
      'original_threshold' => 'Number',
      'assessment'         => 'Number',
      'status'             => 'Boolean',
      'version_at'         => 'Date',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
