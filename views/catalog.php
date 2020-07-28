<?php /** @var app\models\Product $model */?>
<div class="products">
    <?php foreach ($model as $modelItem): ?>
    <div class="product">
        <a href="?c=product&a=card&id=<?=$modelItem->id?>">
            <h1><?=$modelItem->name_product?></h1>
        </a>
    </div>
    <?php endforeach; ?>
</div>

