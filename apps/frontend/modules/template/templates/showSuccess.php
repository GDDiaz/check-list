<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $template->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $template->getName() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $template->getDescription() ?></td>
    </tr>
    <tr>
      <th>Prefix:</th>
      <td><?php echo $template->getPrefix() ?></td>
    </tr>
    <tr>
      <th>Threshold:</th>
      <td><?php echo $template->getThreshold() ?></td>
    </tr>
    <tr>
      <th>Checklists qt:</th>
      <td><?php echo $template->getChecklistsQt() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $template->getStatus() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $template->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $template->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('template/edit?id='.$template->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('template/index') ?>">List</a>
