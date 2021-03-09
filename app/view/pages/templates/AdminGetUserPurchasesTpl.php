<?php if(!isset($products['purchases'][0]->user_id)): ?>
    <h2><b> No purchases </b></h2>
<?php else: ?>
    <h2><b> User#<?php echo $products['purchases'][0]->user_id ?> Purchases</b></h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm bg-gradient table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>user_id</th>
            <th>total_price</th>
            <th>status</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>
        </thead>
        <tbody>
<?php foreach($products['purchases'] as $key => $value) { ?>
    <tr>
        <td><?php echo $products['purchases'][$key]->id ?></td>
        <td><?php echo $products['purchases'][$key]->user_id ?></td>
        <td><?php echo "$" . $products['purchases'][$key]->total_price ?></td>
        <td><?php echo $products['purchases'][$key]->status ?></td>
        <td><?php echo $products['purchases'][$key]->created_at ?></td>
        <td><?php echo $products['purchases'][$key]->updated_at ?></td>
    </tr>
<?php } endif;?>
