<h1>Templates List</h1>

<table>
  <thead>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Description</th>
    <th>Prefix</th>
    <th>Threshold</th>
    <th>Checklists qt</th>
    <th>Status</th>
    <th>Created at</th>
    <th>Updated at</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($templates as $template): ?>
    <tr>
      <td><a href="<?php echo url_for('template/show?id=' . $template->getId()) ?>"><?php echo $template->getId() ?></a>
      </td>
      <td><?php echo $template->getName() ?></td>
      <td><?php echo $template->getDescription() ?></td>
      <td><?php echo $template->getPrefix() ?></td>
      <td><?php echo $template->getThreshold() ?></td>
      <td><?php echo $template->getChecklistsQt() ?></td>
      <td><?php echo $template->getStatus() ?></td>
      <td><?php echo $template->getCreatedAt() ?></td>
      <td><?php echo $template->getUpdatedAt() ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<div class="fab">
  <div class="trigger text-white bg-info"><i class="fa fa-ellipsis-v"></i></div>
  <div class="actions">
    <div class="action">
      <a data-toggle="tooltip" data-placement="left" title="Nueva plantilla" href="<?php echo url_for('template/new') ?>" class="btn btn-info btn-circle"><i class="fa fa-plus"></i></a>
    </div>
    <div class="action">
      <a data-toggle="tooltip" data-placement="left" title="Nuevo criterio" href="<?php echo url_for('template/newCriterion') ?>" class="btn btn-info btn-circle"><i
                class="fa fa-check-square-o"></i></a>
    </div>
    <div class="action">
      <button data-placement="left" title="Filtrar"  type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#filterModal"
              data-whatever="@getbootstrap"><i class="fa fa-search"></i>
      </button>
    </div>
  </div>

  <?php // include_partial('filter', array( 'url' => 'template/index', 'formFilter' => $formFilter))?>
  <?php include_partial('checkList/form_filter', array('url' => 'template/index', 'formFilter' => $formFilter)) ?>

