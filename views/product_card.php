<?php /** @var app\models\Product $model */?>
<h1><?=$model->name_product?></h1>
<h3><?=$model->description?></h3>
<form action="" method="post">
    <input type="hidden" value="<?=$model->id?>" name="product_id">
    <input class="auth_button" type="submit" value="Order Us" name="order">
</form>

