<?php

    foreach ($products as $item): ?>
        <?php extract($item) ?>
        <ui>
            <div class="product-item" id="<?php echo $item['id']?>">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item['name']?></h5>
                                <p class="card-text"><?php echo $item['img']?> <?php echo $item['desc']?> <?php echo $item['price']?></p>
                                <a href="#" class="btn btn-primary">View product</a>
                                <a href="#" class="btn btn-success">Buy</a><br>
                                <em><?php echo $item['status']?></em>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ui>
    <?php endforeach ?>