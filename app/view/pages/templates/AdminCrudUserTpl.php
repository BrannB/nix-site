
    <?php foreach($products['users'] as $key => $value) { ?>
        <tr>
            <td><?php echo $products['users'][$key]->id ?></td>
            <td><?php echo $products['users'][$key]->first_name ?></td>
            <td><?php echo $products['users'][$key]->last_name ?></td>
            <td><?php echo $products['users'][$key]->uname ?></td>
            <td><?php echo $products['users'][$key]->email ?></td>
            <td><?php echo $products['users'][$key]->is_admin ?></td>
            <td>
                <form action="adminGetUserPurchases" method="post">
                    <button class="btn btn-outline-info"
                            value="<?php echo $products['users'][$key]->id?>" name = "id">
                        Purchases
                    </button>
                </form>
            </td>
            <td>
                <form action="adminUpdateUser" method="post">
                    <button class="btn btn-outline-dark"
                            value="<?php echo $products['users'][$key]->id?>" name = "id">
                        UPDATE
                    </button>
                </form>
            </td>
            <td>
                <form action="adminDeleteUser" method="post">
                    <button class="btn btn-danger"
                            value="<?php echo $products['users'][$key]->id?>" name = "id">
                        DELETE
                    </button>
                </form>
            </td>
        </tr>
    <?php } ?>