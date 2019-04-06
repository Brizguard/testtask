<?php
namespace console\models;

use yii\base\Model;
use Yii;

class Dbcreate extends Model
{
    public static function createDb($userName = null)
    {
        $cmd = escapeshellcmd('mysql -u '.$userName.' -p -e "create database testtask character set utf8 collate utf8_unicode_ci"');

        shell_exec($cmd);

        Yii::$app->db->open();

        if (Yii::$app->db->getIsActive()) {
            echo "BD create";
        }

    }
}