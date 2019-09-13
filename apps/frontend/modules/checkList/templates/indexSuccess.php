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
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $check_list): ?>
    <tr>
      <td><a href="<?php echo url_for('checkList/show?id='.$check_list->getId()) ?>"><?php echo $check_list->getId() ?></a></td>
      <td><?php echo $check_list->getName() ?></td>
      <td><?php echo $check_list->getObservations() ?></td>
      <td><?php echo $check_list->getOriginalThreshold() ?></td>
      <td><?php echo $check_list->getStatus() ?></td>
      <td><?php echo $check_list->getVersionAt() ?></td>
      <td><?php echo $check_list->getCreatedAt() ?></td>
      <td><?php echo $check_list->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include_partial('pagination', array('pager' => $pager)) ?>

  <a href="<?php echo url_for('checkList/new') ?>">New</a>
