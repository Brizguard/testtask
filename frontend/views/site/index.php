<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Работники';
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить работника', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Активные', ['index', 's'=>'act'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Не активные', ['index', 's'=>'no'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Все', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отчет', ['report'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'surname',
            'phone',
            'position',
            //'active',
            'salary',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
