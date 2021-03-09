
<?php foreach($products['users'] as $key => $value) { ?>
    <tr>
        <td><?php echo $products['users'][$key]->id ?></td>
        <td><?php echo $products['users'][$key]->first_name ?></td>
        <td><?php echo $products['users'][$key]->last_name ?></td>
        <td><?php echo $products['users'][$key]->uname ?></td>
        <td><?php echo $products['users'][$key]->email ?></td>
        <td><?php echo $products['users'][$key]->country ?></td>
        <td><?php echo $products['users'][$key]->is_admin ?></td>
        <td><?php echo $products['users'][$key]->created_at ?></td>
        <td><?php echo $products['users'][$key]->updated_at ?></td>
    </tr>
<?php } ?>


