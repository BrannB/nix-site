
<?php foreach($products['products'] as $key => $value) { ?>
    <tr>
        <td><?php echo $products['products'][$key]->id ?></td>
        <td><?php echo $products['products'][$key]->name ?></td>
        <td><?php echo $products['products'][$key]->description ?></td>
        <td><?php echo "$" . $products['products'][$key]->price ?></td>
        <td><?php echo $products['products'][$key]->category ?></td>
        <td><?php echo $products['products'][$key]->status ?></td>
        <td><?php echo $products['products'][$key]->created_at ?></td>
        <td><?php echo $products['products'][$key]->updated_at ?></td>
    </tr>
<?php } ?>



