<h2>Welcome, <?php echo $sf_user ?></h2>
<table>
  <tbody>
    <tr>
      <th>Email Address</th>
      <td><?php echo $sf_user->getEmail() ?></td>
    </tr>
    <tr>
      <th>Username</th>
      <td><?php echo $sf_user->getUsername() ?></td>
    </tr>
    <tr>
      <th>Ip address:</th>
      <td><?php echo $staff->getIpAddress() ?></td>
    </tr>
    <tr>
      <th>Session key:</th>
      <td><?php echo $staff->getSessionKey() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $staff->getDateTimeObject('created_at')->format('M d, Y h:i a') ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('user/edit?id='.$staff->getId()) ?>">Edit</a>
