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
      $this->widgetSchema['name'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control'));
      $this->widgetSchema['checklist_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CheckList'), 'add_empty' => false), array( 'class' => 'form-control'));
      $this->widgetSchema['final_weight'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control'));

      $this->validatorSchema['final_weight'] = new sfValidatorNumber(
          array( 'max' => 100, 'min' => 0 ),
          array( 'min' => 'Ingrese un valor mayor a cero', 'max' => 'Ingrese un valor inferior a 100')
      );

      $this->validatorSchema->setPostValidator(
          new sfValidatorCallback(array('callback' => array($this, 'checkWeight')))
      );

      $this->useFields(['name', 'checklist_id', 'final_weight']);
  }



    public function checkWeight($validator, $values)
    {

        if($values['checklist_id'] != null && $values['final_weight'] != null)
        {
            $criterionId = ($this->isNew()) ? false : $this->getObject()->getId();
            $total =  CheckedStandardTable::sumWeightByCheckList($values['checklist_id'], $criterionId);

            $newTotal = $total + $values['final_weight'];
            if($newTotal > 100) {
                $error = new sfValidatorError($validator, 'Alerta!: la suma de los porcentajes supera el 100%!, el porcentaje del criterio debe ser igual o menor a ' . (100 - $total));
                $ves = new sfValidatorErrorSchema($validator, array('final_weight' => $error));
                throw $ves;
            }
        }
        // checkWeight is correct, return the clean values
        return $values;
    }
}
