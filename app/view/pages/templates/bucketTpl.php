<body class="bg-dark" style="
    background: url(https://witcher-tv.ru/wp-content/uploads/2020/02/2nd-geralt-poster-4k.jpg) no-repeat center center fixed;
    -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: cover;
">
<?php if ($products['session']->sessionExists() && empty($products['products'])): ?>
    <br>
    <h1 class="text-center">
        <mark style="background-color: snow; color: #0c5460">
            <b>Now your bucket is empty.</b>
        </mark>
    </h1>
    <br>
<?php else: ?>
    <?php
        $finalPrice = 0;
    ?>
    <?php foreach ($products['products'] as $key => $value):
        if(!isset($value->amount))
            $value->amount = 1;
        ?>
    <div class="container mt-4">
        <div class="card">
            <img src="<?php echo $value->image ?>"  class="card-img-bottom" alt="...">
            <div class="card-body text-center" style=" color: #0c5460; background-image: url(https://convertingcolors.com/gradient-0C5460.svg)">
                <h2 class="card-title" style="background-color: snow;">

                        <b><?php echo $value->name ?></b>

                </h2>
                <h5 class="card-title text-lg-center" style="background-color: snow">
                    <br>
                        <b><?php echo $value->description ?></b>
                    <br>
                    <br>
                </h5>
                <form action="bucket/setAmount" method="post" class="text-center">
                <button <?php if($value->amount <= 1) echo "disabled"?> class="btn btn-outline-warning btn-lg" type="submit" name="changeAmount-"
                        value="<?php echo $key?>">
                    <b>-</b>
                </button>
                <button disabled class="btn btn-outline-warning btn-lg" name="deleteProduct"
                        value="<?php echo $key?>">
                    <b>
                        <?php
                        if(!isset($value->amount))
                            $value->amount = 1;
                        echo $value->amount;
                        ?>
                    </b>
                </button>
                <button  class="btn btn-outline-warning btn-lg" type="submit" name="changeAmount+"
                        value="<?php echo $key?>">
                    <b>+</b>
                </button>
                    </form>
                <form action="bucket/remove" method="post" class="text-right">
                    <h2 class="card-title">
                        <br>
                        <button class="btn btn-info btn-lg" type="submit" name="deleteProduct"
                                value="<?php echo $key?>">
                            Remove
                        </button>
                        <mark style="background-color: snow; color: darkorange">
                            <b>
                                $<?php echo $value->price * $value->amount ?>
                            </b>
                        </mark>
                    </h2>
                </form>
            </div>
        </div>
    </div>
    <?php $finalPrice += $value->price * $value->amount?>
    <?php endforeach; ?>
    <?php $products['session']->set('finalPrice', $finalPrice) ?>
    <div class="container mt-4 text-right">
        <h1 class>
            <mark style="background-color: snow; color: #0c5460">
                <b>Final price:
                    $<?php echo $products['session']->get('finalPrice')?>
                </b>
            </mark>
        </h1>
    </div>
    <div class="container mt-4 text-right">
        <form action="bucket/makeOrder" class="text-right" method="post">
            <button name="makeOrder" type="submit" class="btn-lg btn-warning"><b>Buy!</b></button>
        </form>
    </div>
<br><br>
<?php endif; ?>