<?php /** @var app\models\Product $model $cart */
/** @var app\models\Product $cart*/?>
<div class="products">
    <?php if(empty($model)):?>
    <div>Корзина пуста!</div>
    <?php else:?>
        <?php foreach ($model as $modelItem): ?>
            <div class="product">
                <a href="?c=product&a=card&id=<?=$modelItem->id?>">
                    <h1><?=$modelItem->name_product?></h1>
                </a>
                <p>Количество - <?= $cart[$modelItem->id]?></p>
                <p>Цена заединицу: <?=$modelItem->price?> руб.</p>
                <p>Общая сумма позиции: <?= $modelItem->price * $cart[$modelItem->id]?> руб.</p>
                <form action="" method="post">
                    <input type="hidden" value="<?=$modelItem->id?>" name="2">
                    <input type="submit" value="Удалить">
                </form>

            </div>
        <?php endforeach; ?>
    <?php endif;?>
</div>
