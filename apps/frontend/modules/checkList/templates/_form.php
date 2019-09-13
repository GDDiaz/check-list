<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form class="floating-labels m-t-40" action="<?php echo url_for('checkList/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <div class="row">
    <div class="col-md-12">
      <ul class="error_list">
        <?php foreach ($form->getGlobalErrors() as $name => $error): ?>
          <li><?php echo $name.': '.$error ?></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="form-group col-md-12 col-md-offset-3 <?php echo $form['name']->hasError() ? 'has-error': '' ?>">
      <?php echo $form['name'] ?>
      <span class="bar"></span>
     <?php echo $form['name']->renderLabel() ?>
     <?php echo $form['name']->renderError() ?>
    </div>

    <div class="form-group col-md-12 col-md-offset-3 <?php echo $form['reference']->hasError() ? 'has-error': '' ?>">
      <?php echo $form['reference'] ?>
      <span class="bar"></span>
      <?php echo $form['reference']->renderLabel() ?>
      <?php echo $form['reference']->renderError() ?>
    </div>

    <div class="form-group col-md-12 <?php echo $form['observations']->hasError() ? 'has-error': '' ?>">
      <?php echo $form['observations'] ?>
      <span class="bar"></span>
      <?php echo $form['observations']->renderLabel() ?>
      <?php echo $form['observations']->renderError() ?>
    </div>

    <div class="form-group col-md-12 <?php echo $form['template_id']->hasError() ? 'has-error': '' ?>">
      <?php echo $form['template_id'] ?>
      <span class="bar"></span>
      <?php echo $form['template_id']->renderLabel() ?>
      <?php echo $form['template_id']->renderError() ?>
    </div>

    <div class="form-group col-md-12 <?php echo $form['responsible_id']->hasError() ? 'has-error': '' ?>">
      <?php echo $form['responsible_id'] ?>
      <span class="bar"></span>
      <?php echo $form['responsible_id']->renderLabel() ?>
      <?php echo $form['responsible_id']->renderError() ?>
    </div>

    <div class="form-group col-md-12 <?php echo $form['original_threshold']->hasError() ? 'has-error': '' ?>">
     <?php echo $form['original_threshold'] ?>
      <span class="bar"></span>
      <?php echo $form['original_threshold']->renderLabel() ?>
      <?php echo $form['original_threshold']->renderError() ?>
    </div>

      <div class="form-group col-md-12 <?php echo $form['status']->hasError() ? 'has-error': '' ?>">
        <?php echo $form['status'] ?>
        <span class="bar"></span>
        <?php echo $form['status']->renderLabel() ?>
      </div>
      <div class="col-md-12">
        <?php  echo $form->renderHiddenFields()?>
      </div>
  </div>
  <div class="row">
    <div class="col m12">
      &nbsp;<a href="<?php echo url_for('checkList/index') ?>">Back to list</a>
      <?php if (!$form->getObject()->isNew()): ?>
         &nbsp;<?php echo link_to('Borrar', 'checkList/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
      <?php endif; ?>
      <input type="submit" value="Save" />

    </div>
  </div>
</form>
