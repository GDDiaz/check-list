<?php

/**
 * Template filter form.
 *
 * @package    check-list
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id$
 */
class TemplateFormFilter extends BaseTemplateFormFilter
{
  public function configure()
  {
      foreach ($this->getWidgetSchema()->getFields() as $field)
      {
          $field->setAttribute('class', 'form-control');
      }
      sfWidgetFormSchema::setDefaultFormFormatterName('custom');
  }
}
