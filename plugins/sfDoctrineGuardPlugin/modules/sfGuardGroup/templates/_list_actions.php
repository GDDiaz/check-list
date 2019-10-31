
<div class="fab">
  <div class="trigger text-white bg-info"><i class="fa fa-ellipsis-v"></i></div>
  <div class="actions">
    <div class="action">

      <a data-toggle="tooltip" data-placement="left" title="Nuevo usuario"  href="<?php echo url_for('sfGuardGroup/new') ?>" class="btn btn-info btn-circle"><i class="fa fa-plus"></i></a>
    </div>
    <div class="action">
      <button data-placement="left" title="Filtrar"  type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#filterModal"
              data-whatever="@getbootstrap"><i class="fa fa-search"></i>
      </button>
    </div>
  </div>
