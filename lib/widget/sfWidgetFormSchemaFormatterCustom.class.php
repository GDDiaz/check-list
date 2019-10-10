<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * 
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */
class sfWidgetFormSchemaFormatterCustom extends sfWidgetFormSchemaFormatter
{
  protected
    $rowFormat       = "<div class=\"form-group col-md-12\">\n 
                          %label%\n 
                          %field%%hidden_fields%\n 
                          <span class=\"bar\"></span>\n
                          %error%
                          %help%
                        </div>\n",
    $errorRowFormat  = "\n%errors%\n",
    $helpFormat      = '<br />%help%',
    $decoratorFormat = "%content%";
}
