<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form class="floating-labels m-t-40" action="<?php echo url_for('checkList/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <div class="row">
    <div class="col m6">
    <?php echo $form['name']->renderLabel() ?>
      <?php echo $form['name'] ?>
      <?php echo $form['name']->renderError() ?>
      <?php echo $form['descriptor']->renderLabel() ?>
      <?php echo $form['descriptor'] ?>
      <?php echo $form['descriptor']->renderError() ?>
      <?php echo $form['prefix']->renderLabel() ?>
      <?php echo $form['prefix'] ?>
      <?php echo $form['prefix']->renderError() ?>
    </div>
    <div class="col m6">
      <?php echo $form['threshold']->renderLabel() ?>
      <?php echo $form['threshold'] ?>
      <?php echo $form['threshold']->renderError() ?>
      <?php echo $form['status']->renderLabel() ?>
      <?php echo $form['status'] ?>
      <?php echo $form['status']->renderError() ?>
    </div>
  </div>
  <div class="row">
    <div class="col m12">
      &nbsp;<a href="<?php echo url_for('checkList/index') ?>">Back to list</a>
      <?php if (!$form->getObject()->isNew()): ?>
         &nbsp;<?php echo link_to('Delete', 'checkList/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
      <?php endif; ?>
      <input type="submit" value="Save" />

    </div>
  </div>
</form>
