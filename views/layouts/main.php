<?php
$yearNow = date('Y');
?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Product</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style_product.css">
    </head>
    <body>
    <div class="container">
        <div class="header">
            <a href="index.php"><img src="img/logo.svg" alt="logo"></a>
            <ul class="menu-top">
                <li class="top-list1"><a href="#" class="top-link">personal account</a></li>
                <li class="top-list3"><a href="index.php" class="top-link">SHOWROOM</a></li>
                <li class="top-list3"><a href="?c=cart&a=cart" class="top-link">cart</a></li>
            </ul>
        </div>
        <?php /** @var app\controllers\ProductController $content */ ?>
        <?=$content?>
    </div>
    <div class="footer-footer">
        <p>© Copyright - <?= $yearNow ?>. All Rights Reserved.</p>
    </div>
    </body>
    </html>




