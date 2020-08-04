<?php

namespace app\controllers;

use app\models\Product;

class CartController extends Controller
{

    //TODO реализовать по средствам кода с первого курса PHP
    public function actionCart()
    {
        $model = [];
        $cart = $_SESSION['cart'];
        if (!empty($cart)) {
            $model = Product::getByIds($cart);
        }
        echo $this->render('cart', ['model' => $model, 'cart' => $cart]);

    }

    public function addCart()
    {
        $productId = (int)$_POST['product_id'];
        $productQty = 1;
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $productQty;
        } else {
            $_SESSION['cart'][$productId] = $productQty;
        }
    }
    public static function deleteItemCart($id)
    {
        $_SESSION['product_id'] = [];
        var_dump($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        }
    }
}