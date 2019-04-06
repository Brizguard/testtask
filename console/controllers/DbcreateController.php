<?php
namespace console\controllers;


use yii\console\Controller;
use console\models\Dbcreate;

class DbcreateController extends Controller
{
    public function actionCreate($userName)
    {
        Dbcreate::createDb($userName);
    }
}