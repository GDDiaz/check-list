<?php

/**
 * Criteria form.
 *
 * @package    check-list
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
class CriteriaForm extends BaseCriteriaForm
{
  public function configure()
  {
      $this->widgetSchema['name'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control'));
      $this->widgetSchema['check_list_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CheckList'), 'add_empty' => false), array( 'class' => 'form-control'));
      $this->widgetSchema['weight'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control'));

      $this->validatorSchema['weight'] = new sfValidatorNumber(
          array( 'max' => 100, 'min' => 0 ),
          array( 'min' => 'Ingrese un valor mayor a cero', 'max' => 'Ingrese un valor inferior a 100')
      );

      $this->validatorSchema->setPostValidator(
          new sfValidatorCallback(array('callback' => array($this, 'checkWeight')))
      );

      $this->useFields(['name', 'check_list_id', 'weight']);
  }



    public function checkWeight($validator, $values)
    {

        if($values['check_list_id'] != null && $values['weight'] != null)
        {
            CriteriaTable::sumWeightByCheckList($values['check_list_id']);
            if(true)
            {
                $error = new sfValidatorError($validator, 'Alerta!: la suma de los porcentajes supera el 100%!');
                $ves = new sfValidatorErrorSchema($validator, array('weight' => $error));
                throw $ves;
            }
        }
        // checkWeight is correct, return the clean values
        return $values;
    }
}
