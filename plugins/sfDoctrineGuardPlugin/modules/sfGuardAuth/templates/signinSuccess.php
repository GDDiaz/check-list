
<?php use_helper('I18N') ?>
<?php decorate_with('layoutLogin')?>


<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>