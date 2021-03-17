

<?php foreach($products['products'] as $key => $value) { ?>
    <tr>
        <td><?php echo $products['products'][$key]->id ?></td>
        <td><?php echo $products['products'][$key]->name ?></td>
        <td><?php echo $products['products'][$key]->description ?></td>
        <td><?php echo "$" . $products['products'][$key]->price ?></td>
        <td><?php echo $products['products'][$key]->category ?></td>
        <td><?php echo $products['products'][$key]->status ?></td>
        <td>
            <form action="adminUpdateProduct" method="post">
                <button class="btn btn-outline-dark"
                        value="<?php echo $products['products'][$key]->id?>" name = "id">
                    UPDATE
                </button>
            </form>
        </td>
        <td>
            <form action="adminDeleteProduct" method="post">
                <button class="btn btn-danger"
                        value="<?php echo $products['products'][$key]->id?>" name = "id">
                    DELETE
                </button>
            </form>
        </td>
    </tr>
<?php } ?>