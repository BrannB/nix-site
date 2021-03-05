<body class="bg-dark" style="
    background: url(https://witcher-tv.ru/wp-content/uploads/2020/02/2nd-geralt-poster-4k.jpg) no-repeat center center fixed;
    -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: cover;
">
 <?php
 if (empty($products['purchases'])): ?>
    <br>
    <h1 class="text-center">
        <mark style="background-color: snow; color: #0c5460">
            <b>Now your purchases list is empty.</b>
        </mark>
    </h1>
    <br>
    <?php else: ?>
     <div class="container mt-4">
         <table class="table table-dark table-striped text-center table-hover" >
         <thead>
         <tr>
             <th scope="col">Purchase id</th>
             <th scope="col">Created at</th>
             <th scope="col">Total Price</th>
             <th scope="col">Status</th>
         </tr>
         </thead>
         <tbody>
 <?php foreach($products['purchases'] as $purchase): ?>
            <tr>
                <th scope="row"><?php echo $purchase->id ?></th>
                <td><?php echo $purchase->created_at ?></td>
                <td>$<?php echo $purchase->total_price ?></td>
                <td><?php echo $purchase->status ?></td>
                <td>
                    <form action="purchaseDetails" method="post">
                        <button class="btn btn-outline-info" name="details-btn"
                                value="<?php echo $purchase->id ?>" type="submit"
                                style="color: snow">
                            Details
                        </button>
                    </form>
                </td>
            </tr>
 <?php endforeach; ?>
         </tbody>
         </table>
     </div>
<?php endif; ?>
