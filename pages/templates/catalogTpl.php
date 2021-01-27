
    <?php
    foreach ($products as $item): ?>
        <?php extract($item) ?>

            <div class="card">
                <img src= "<?php echo $item["img"]?>" alt="...">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $item['name']?></h2>
                    <p class="card-text"><?php echo $item['desc']?></p>
                    <p class="card-text"><small class="text-muted"><?php echo $item['status']?></small></p>
                    <div class="text text-right">
                        <h3><b><?php echo $item['price']?></b></h3>
                        <button href="#" class="btn btn-primary"> View </button>
                        <button href="#" class="btn btn-success"> Buy </button>

                    </div>

                </div>
            </div>
    <br>
    <?php endforeach ?>
