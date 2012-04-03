<h1>Shipping transaction details List</h1>

<table>
  <thead>
    <tr>
      <th>Shipping transaction</th>
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
      <td><?php echo $shipping_transaction_detail->getShippingTransaction() ?></td>
      <td><?php echo $shipping_transaction_detail->getBarcode() ?></td>
      <td><a href="<?php echo url_for('shipping_transaction_detail/show?id='.$shipping_transaction_detail->getId()) ?>">show</a> | <a href="<?php echo url_for('shipping_transaction_detail/edit?id='.$shipping_transaction_detail->getId()) ?>">edit</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('shipping_transaction_detail/new') ?>">New</a>
