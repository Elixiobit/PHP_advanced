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
        $id = $_GET['id'];
        $model = Product::getById($id);
        echo $this->render('product_card', ['model' => $model]);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $cart = new CartController( new \app\services\renderers\TemplateRenderer());
            $cart->addCart();
        }
    }



}