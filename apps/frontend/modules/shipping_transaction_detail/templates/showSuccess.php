<table>
  <tbody>
    <tr>
      <th>Shipping transaction:</th>
      <td><?php echo $shipping_transaction_detail->getShippingTransaction() ?></td>
    </tr>
    <tr>
      <th>Barcode:</th>
      <td><?php echo $shipping_transaction_detail->getBarcode() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $shipping_transaction_detail->getDateTimeObject('created_at')->format('M d, Y h:i a') ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $shipping_transaction_detail->getDateTimeObject('updated_at')->format('M d, Y h:i a') ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('shipping_transaction_detail/edit?id='.$shipping_transaction_detail->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('shipping_transaction_detail/index') ?>">List</a>
