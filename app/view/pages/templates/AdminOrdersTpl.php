<?php foreach($products['orders'] as $key => $value) { ?>
    <tr>
        <td><?php echo $products['orders'][$key]->id ?></td>
        <td><?php echo $products['orders'][$key]->purchase_id ?></td>
        <td><?php echo $products['orders'][$key]->product_id ?></td>
        <td><?php echo $products['orders'][$key]->product_amount ?></td>
        <td><?php echo $products['orders'][$key]->created_at ?></td>
        <td><?php echo $products['orders'][$key]->updated_at ?></td>
    </tr>
<?php } ?>
<br>
