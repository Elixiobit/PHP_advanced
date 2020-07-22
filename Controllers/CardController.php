<?php

namespace app\controllers;

class CardController extends Controller
{
    public function actionAdd()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!empty($_POST['order']) && empty($_SESSION['product_id'])) {
                $_SESSION['product_id'] = ['product_id'];}
//            } else {
//                array_push($_SESSION['product_id'], '1');
//                var_dump($_SESSION);
//
//
//
//            }
        }
        var_dump($_POST);
//
//            $deleteItem = post('product_id');
//            $key = array_search($deleteItem, session('product_id'));
//            unset ($_SESSION['product_id'][$key]);
//        }
//
//        $products = session('product_id');
//        $fileInclude = VIEWS_DIR . 'cart.php';
//        include VIEWS_DIR . 'main.php';

//    } else {
//redirect("login.php");
//}

    }
}