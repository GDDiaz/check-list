
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $check_list->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $check_list->getNameWithPrefix() ?></td>
    </tr>
    <tr>
      <th>Descriptor:</th>
      <td><?php echo $check_list->getDescriptor() ?></td>
    </tr>
    <tr>
      <th>Prefix:</th>
      <td><?php echo $check_list->getPrefix() ?></td>
    </tr>
    <tr>
      <th>Threshold:</th>
      <td><?php echo $check_list->getThreshold() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $check_list->getStatus() ?></td>
    </tr>
    <tr>
      <th>Version at:</th>
      <td><?php echo $check_list->getVersionAt() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $check_list->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $check_list->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('checkList/edit?id='.$check_list->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('checkList/index') ?>">List</a>
