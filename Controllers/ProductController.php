<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{


    public function actionIndex()
    {
        $model = Product::getALl();
        echo $this->render('catalog', ['model' => $model]);
    }
    public function actionCard()
    {
//        session_start();
        $id = $_GET['id'];
        $model = Product::getById($id);
        echo $this->render('product_card', ['model' => $model]);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $productId = (int)$_POST['product_id'];
            $productQty = 1;
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId] += $productQty;
            } else {
                $_SESSION['cart'][$productId] = $productQty;
            }
//            echo render("add", [], false);
        }
        var_dump($_POST);
    }



}