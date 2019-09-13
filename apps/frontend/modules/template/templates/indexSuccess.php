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
      <td><a href="<?php echo url_for('template/show?id='.$template->getId()) ?>"><?php echo $template->getId() ?></a></td>
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

  <a href="<?php echo url_for('template/new') ?>">New</a>
<a href="<?php echo url_for('template/newCriterion')?>">New Criterion</a>
