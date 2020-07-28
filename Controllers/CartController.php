<?php

namespace app\controllers;

use app\models\Product;

class CartController extends Controller
{

    //TODO реализовать по средствам кода с первого курса PHP
    public function actionCart()
    {
//        session_start();
        $model = [];
        $cart = $_SESSION['cart'];
        if (!empty($cart)) {
            $model = Product::getProductByIds($cart);
        }
        echo $this->render('cart', ['model' => $model, 'cart' => $cart]);

        var_dump($_POST);
    }

    public static function deleteItemCart($id)
    {
        $_SESSION['product_id'] = [];
        var_dump($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        }
    }
}