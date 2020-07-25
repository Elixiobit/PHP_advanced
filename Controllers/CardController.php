<?php

namespace app\controllers;

class CardController extends Controller
{
    //TODO реализовать по средствам кода с первого курса PHP
    public function actionAdd()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!empty($_POST['order']) && empty($_SESSION['product_id'])) {
                $_SESSION['product_id'] = ['product_id'];
            }
        }
    }
}