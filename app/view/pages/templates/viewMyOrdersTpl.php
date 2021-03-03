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
 <?php foreach($products['purchases'] as $purchase): ?>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body text-center" style=" color: #0c5460; background-image: url(https://convertingcolors.com/gradient-0C5460.svg)">
                <h2 class="card-title" style="background-color: snow;">
                    <b><?php echo "Purchase #" . $purchase->id ?></b>
                </h2>
                <div class="text-center" style="color:
                <?php
                if ($purchase->status == 'completed')
                    echo "green";
                elseif ($purchase->status == 'canceled')
                    echo "red";
                elseif ($purchase->status == 'pending')
                    echo "darkorange";
                ?>;
                background-color: snow;  font-size: 22px;">
                    <b><?php echo "Status: "?></b><?php echo $purchase->status ?>
                </div>
                <div class="text-center" style="font-size: 15px; background-color: snow;">
                    <?php echo "(Date of creating: $purchase->created_at)" ?>
                </div>
                <div class="text-right">
                    <h2 class="card-title">
                        <br>
                        <mark style="background-color: snow; color: darkorange; font-size: 22px;">
                            <b>
                                $<?php echo $purchase->total_price; ?>
                            </b>
                        </mark>
                    </h2>
                </div>
            </div>
        </div>
    </div>
  <?php endforeach; ?>
    <?php endif; ?>
