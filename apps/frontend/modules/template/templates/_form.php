<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form  class="floating-labels m-t-40 general" action="<?php echo url_for('template/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <div class="row">
    <?php echo $form ?>
    &nbsp;<a  class="btn btn-light" href="<?php echo url_for('template/index') ?>">Back to list</a>
    <?php if (!$form->getObject()->isNew()): ?>
      &nbsp;<?php echo link_to('Delete', 'template/delete?id='.$form->getObject()->getId(), array('class' => 'btn btn-danger', 'method' => 'delete', 'confirm' => 'Are you sure?')) ?>
    <?php endif; ?>
    &nbsp;&nbsp;
    <input class="btn btn-info" type="submit" value="Save" />

  </div>




</form>
