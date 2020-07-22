<?php /** @var app\models\Product $model */?>
<div class="product">
    <?php foreach ($model as $modelItem): ?>
        <h1><?=$modelItem->name_product?></h1>
        <h1><?=$modelItem->description?></h1>
        <form action="../controllers/CardController.php" method="post">
            <input type="hidden" value="<?=$modelItem->id?>" name="product_id">
            <input type="submit" value="Order Us" name="order">
        </form>
    <?php endforeach; ?>
</div>

