<?php

/**
 * Standard form.
 *
 * @package    check-list
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
class StandardForm extends BaseStandardForm
{
  public function configure()
  {
      $this->widgetSchema['name'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control'));
      $this->widgetSchema['template_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Template'), 'add_empty' => false), array( 'class' => 'form-control'));
      $this->widgetSchema['weight'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control'));

      $this->validatorSchema['weight'] = new sfValidatorNumber(
          array( 'max' => 100, 'min' => 0 ),
          array( 'min' => 'Ingrese un valor mayor a cero', 'max' => 'Ingrese un valor inferior a 100')
      );

      $this->validatorSchema->setPostValidator(
          new sfValidatorCallback(array('callback' => array($this, 'checkWeight')))
      );

      $this->useFields(['name', 'template_id', 'weight']);
  }



    public function checkWeight($validator, $values)
    {

        if($values['template_id'] != null && $values['weight'] != null)
        {
            $criterionId = ($this->isNew()) ? false : $this->getObject()->getId();
            $total =  StandardTable::sumWeightByCheckList($values['template_id'], $criterionId);

            $newTotal = $total + $values['weight'];
            if($newTotal > 100) {
                $error = new sfValidatorError($validator, 'Alerta!: la suma de los porcentajes supera el 100%!, el porcentaje del criterio debe ser igual o menor a ' . (100 - $total));
                $ves = new sfValidatorErrorSchema($validator, array('weight' => $error));
                throw $ves;
            }
        }
        // checkWeight is correct, return the clean values
        return $values;
    }
}
