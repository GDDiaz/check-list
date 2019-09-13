<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<h2 class="box-title"><?php echo $title?></h2>
<hr class="m-t-0 m-b-40">

<form class="floating-labels m-t-40" action="<?php echo url_for('template/'.($form->getObject()->isNew() ? 'newCriterion' : 'editCriterion').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
        </div>

        <div class="form-group col-md-12 <?php echo $form['template_id']->hasError() ? 'has-error': '' ?>">
            <?php echo $form['template_id'] ?>
            <span class="bar"></span>
            <?php echo $form['template_id']->renderLabel() ?>
        </div>

        <div class="form-group col-md-12 <?php echo $form['weight']->hasError() ? 'has-error': '' ?>">
            <?php echo $form['weight'] ?>
            <?php echo $form['weight']->renderError() ?>
            <span class="bar"></span>
            <?php echo $form['weight']->renderLabel() ?>
        </div>
        <div class="col-md-12">
            <?php  echo $form->renderHiddenFields()?>
        </div>


    </div>
    <div class="row">
        <div class="col m12">
            &nbsp;<a href="<?php echo url_for('template/index') ?>">Back to list</a>
            <?php if (!$form->getObject()->isNew()): ?>
                &nbsp;<?php echo link_to('Delete', 'template/deleteCriterion?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
            <?php endif; ?>
            <input type="submit" value="Save" />

        </div>
    </div>
</form>

