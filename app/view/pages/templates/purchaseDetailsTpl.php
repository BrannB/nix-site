<body class="bg-dark" style="
    background: url(https://witcher-tv.ru/wp-content/uploads/2020/02/2nd-geralt-poster-4k.jpg) no-repeat center center fixed;
    -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: cover;
">
<div class="container mt-4">
<?php
if (empty($products['order'])): ?>
    <br>
    <h1 class="text-center">
        <mark style="background-color: snow; color: #0c5460">
            <b>No details.</b>
        </mark>
    </h1>
    <br>

<?php else:
    ?>
    <table class="table table-dark table-striped text-center table-hover" >
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($products['order'] as $order): ?>
            <tr>
                <th scope="row"><?php echo $order->product_name[0]->name; ?></th>
                <td><?php echo $order->product_amount ?></td>
                <td>$<?php echo $order->price[0]->price ?></td>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php endif;?>
    <form action="viewMyOrders" method="post" class="text-right" style="color: snow">
        <button class="btn btn-dark" type="submit">
            Go back
        </button>
    </form>
</div>