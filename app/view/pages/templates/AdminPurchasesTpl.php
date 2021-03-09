
<?php foreach($products['purchases'] as $key => $value) { ?>
    <tr>
        <td><?php echo $products['purchases'][$key]->id ?></td>
        <td><?php echo $products['purchases'][$key]->user_id ?></td>
        <td><?php echo "$" . $products['purchases'][$key]->total_price ?></td>
        <td><?php echo $products['purchases'][$key]->status ?></td>
        <td><?php echo $products['purchases'][$key]->created_at ?></td>
        <td><?php echo $products['purchases'][$key]->updated_at ?></td>
    </tr>
<?php } ?>


