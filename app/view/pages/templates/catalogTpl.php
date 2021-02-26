
<?php if ($products['session']->keyExists('cart_list') && count($products['session']->get('cart_list')) > 0)
    {
        $countProducts = count($products['session']->get('cart_list'));
    }
?>
<?php foreach ($products['products'] as $item): ?>
    <div class="card">
        <img src= "<?php echo $item->image?>" alt="...">
        <div class="card-body">
            <h2 class="card-title"><?php echo $item->name?></h2>
            <p class="card-text"><?php echo $item->description?></p>
            <p class="card-text"><small class="text-muted">
            <?php
              if ($item->status == 1)
                 {
                    echo "В наличии $item->quantity ключей.";
                 } else {
                    echo "Нет в наличии.";
                 }
            ?>
            </small></p>
            <div class="text text-right">
                <h3><b><?php echo $item->price . "$"?></b></h3>
                <button href="#" class="btn btn-primary"> View </button>
                <button href="#" class="btn btn-success"> Buy </button>
            </div>
        </div>
    </div>
    <br>
<?php endforeach; ?>

