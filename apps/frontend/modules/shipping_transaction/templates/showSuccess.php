<table>
  <tbody>
    <tr>
      <th>Expected date:</th>
      <td><?php echo $shipping_transaction->getDateTimeObject('expected_date')->format('M d, Y') ?></td>
    </tr>
    <tr>
      <th>Staff:</th>
      <td><?php echo $shipping_transaction->getStaff() ?></td>
    </tr>
    <tr>
      <th>Destination:</th>
      <td><?php echo $shipping_transaction->getDestination() ?></td>
    </tr>
    <tr>
      <th>Note:</th>
      <td><?php echo $shipping_transaction->getNote() ?></td>
    </tr>
    <tr>
      <th>Active:</th>
      <td><?php echo ($shipping_transaction->getIsactive())?"yes":"no"; ?></td>
    </tr>
    <tr>
      <th>Created on:</th>
      <td><?php echo $shipping_transaction->getDateTimeObject('updated_at')->format('M d, Y h:i a') ?></td>

    </tr>
    <tr>
      <th>Updated on:</th>
      <td><?php echo $shipping_transaction->getDateTimeObject('created_at')->format('M d, Y h:i a') ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('shipping_transaction/edit?id='.$shipping_transaction->getId()) ?>">Edit</a>
 
<a href="<?php echo url_for('shipping_transaction/index') ?>">List</a>

<hr />

<h3>Details</h3>

<table>
  <thead>
    <tr>
      <th>Barcode</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach ($shipping_transaction_details as $i=>$shipping_transaction_detail): 
        $alt = ($i % 2 == 0) ? "even" : "odd";
    ?>
    <tr class="<?=$alt?> paddit">
      <td><?php echo $shipping_transaction_detail->getBarcode() ?></td>
      <td><a href="<?php echo url_for('shipping_transaction_detail/show?id='.$shipping_transaction_detail->getId()) ?>">show</a> | <a href="<?php echo url_for('shipping_transaction_detail/edit?id='.$shipping_transaction_detail->getId()) ?>">edit</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<hr />
  <a href="<?php echo url_for('shipping_transaction_detail/new') ?>">New</a>
<hr />
