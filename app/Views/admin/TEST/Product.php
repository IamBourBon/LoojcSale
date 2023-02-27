<h2><?= esc($title) ?></h2>

<?php if (!empty($product) && is_array($product)): ?>

    <?php foreach ($product as $product_item): ?>

        <h3><?= esc($product_item['v_ProductName']) ?></h3>

        <div class="main">
            <?= esc($product_item['f_ProductPrice']) ?>
        </div>
        
       <p><a href="/admin/viewProduct/<?= esc($product_item['n_ProductID'], 'url') ?>">View Detail</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No Product</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>