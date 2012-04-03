<h1>Staffs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Sf guard user</th>
      <th>Ip address</th>
      <th>Session key</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($staffs as $staff): ?>
    <tr>
      <td><a href="<?php echo url_for('user/show?id='.$staff->getId()) ?>"><?php echo $staff->getId() ?></a></td>
      <td><?php echo $staff->getSfGuardUserId() ?></td>
      <td><?php echo $staff->getIpAddress() ?></td>
      <td><?php echo $staff->getSessionKey() ?></td>
      <td><?php echo $staff->getCreatedAt() ?></td>
      <td><?php echo $staff->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('user/new') ?>">New</a>
