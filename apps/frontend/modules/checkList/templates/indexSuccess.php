<h1>Check lists List</h1>

<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Descriptor</th>
        <th>Threshold</th>
        <th>Status</th>
        <th>Version at</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($pager->getResults() as $check_list): ?>
        <tr>
            <td>
                <a href="<?php echo url_for('checkList/show?id=' . $check_list->getId()) ?>"><?php echo $check_list->getId() ?></a>
            </td>
            <td><?php echo $check_list->getName() ?></td>
            <td><?php echo $check_list->getObservations() ?></td>
            <td><?php echo $check_list->getOriginalThreshold() ?></td>
            <td><?php echo $check_list->getStatus() ?></td>
            <td><?php echo $check_list->getVersionAt() ?></td>
            <td><a href="<?php echo url_for('checkList/resolver?id=' . $check_list->getId()) ?>">Resolver</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include_partial('pagination', array('pager' => $pager)) ?>
<div class="fab">
  <div class="trigger text-white bg-info"><i class="fa fa-ellipsis-v"></i></div>
  <div class="actions">
    <div class="action">
      <a data-toggle="tooltip" data-placement="left" title="Nueva lista de tareas" href="<?php echo url_for('checkList/new') ?>" class="btn btn-info btn-circle"><i class="fa fa-plus"></i></a>
    </div>
    <div class="action">
      <button data-placement="left" title="Filtrar" type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#filterModal"
              data-whatever="@getbootstrap"><i class="fa fa-search"></i>
      </button>
    </div>
  </div>

  <?php include_partial('form_filter', array('formFilter' => $formFilter, 'url' => 'checkList/index')) ?>

