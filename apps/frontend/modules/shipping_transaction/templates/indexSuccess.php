<h1>Shipping transactions List</h1>

<table>
  <thead>
    <tr>
      <th>Expected date</th>
      <th>Staff</th>
      <th>Destination</th>
      <th>Is Active</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach ($shipping_transactions as $i=>$shipping_transaction): 
    $alt = ($i % 2 == 0)?"odd":"even";
    ?>
    <tr class="<?=$alt?> paddit">
      <td><?php echo $shipping_transaction->getDateTimeObject('expected_date')->format('M d, Y') ?></td>
      <td><?php echo $shipping_transaction->getStaff() ?></td>
      <td><?php echo $shipping_transaction->getDestination() ?></td>
      <td><?php echo ($shipping_transaction->getIsactive())? "yes" : "no"; ?></td>
      <td><a href="<?php echo url_for('shipping_transaction/show?id='.$shipping_transaction->getId()) ?>">show</a></td>
      <td><a href="<?php echo url_for('shipping_transaction/edit?id='.$shipping_transaction->getId()) ?>">edit</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('shipping_transaction/new') ?>">New</a>
