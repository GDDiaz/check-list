<?php use_helper('I18N') ?>

<div class="row">
    <form class="floating-labels col-md-12" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">

        <div class="col-md-12">
            <ul class="error_list">
                <?php foreach ($form->getGlobalErrors() as $name => $error): ?>
                    <li><?php echo $name . ': ' . $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>


        <div class="form-group col-md-12 <?php echo $form['username']->hasError() ? 'has-error' : '' ?>">
            <?php echo $form['username'] ?>
            <span class="bar"></span>
            <?php echo $form['username']->renderLabel() ?>
            <?php echo $form['username']->renderError() ?>
        </div>

        <div class="form-group col-md-12 <?php echo $form['password']->hasError() ? 'has-error' : '' ?>">
            <?php echo $form['password'] ?>
            <span class="bar"></span>
            <?php echo $form['password']->renderLabel() ?>
            <?php echo $form['password']->renderError() ?>
        </div>


        <div class="form-group col-md-12 <?php echo $form['remember']->hasError() ? 'has-error' : '' ?>">
            <div class="checkbox checkbox-primary pull-left p-t-0">
                <?php echo $form['remember'] ?>
                <?php echo $form['remember']->renderLabel() ?>
                <?php echo $form['remember']->renderError() ?>
            </div>
        </div>

        <div class="col-md-12" style="margin-bottom: 25px;">
            <?php echo $form->renderHiddenFields() ?>
        </div>

        <div class="form-group  col-md-12">

            <input style="background: #594fd4; border: 1px solid #594fd4;"
                   class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit"
                   value="<?php echo __('Signin', null, 'sf_guard') ?>"/>
        </div>
        <?php $routes = $sf_context->getRouting()->getRoutes() ?>
        <?php if (isset($routes['sf_guard_forgot_password'])): ?>
            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>">
                <?php echo __('Forgot your password?', null, 'sf_guard') ?>
            </a>
        <?php endif; ?>

        <?php if (isset($routes['sf_guard_register'])): ?>
            &nbsp; <a
                    href="<?php echo url_for('@sf_guard_register') ?>">
                <?php echo __('Want to register?', null, 'sf_guard') ?>
            </a>
        <?php endif; ?>

    </form>
</div>