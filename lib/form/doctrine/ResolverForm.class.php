<?php

/**
 * CheckList form.
 *
 * @package    check-list
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
class ResolverForm extends BaseCheckListForm
{
    public function configure()
    {
        $this->useFields([]);
        $this->embedStandardForm();
    }

    private function embedStandardForm(){
        $subForm = new sfForm();
        $standardsList = $this->getObject()->getCheckedStandards();
        /**
         * @var $standard CheckedStandard
         */
        $i = 0;
        foreach ($standardsList as $standard) {
            $checkedStandardForm = new CheckedStandardForm($standard);
            $subForm->embedForm($i, $checkedStandardForm);
            $i++;
        }

        $this->embedForm('standards', $subForm);
    }

}
