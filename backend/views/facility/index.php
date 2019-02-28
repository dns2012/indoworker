<?php

use yii\helpers\Html;
/* use yii\grid\GridView; */
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facilities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facility-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Facility', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'responsive'=>true,
        'hover'=>true,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'facility_id',
            'title',
            'content:ntext',
            //'photo1',
            //'photo2',
            //'photo3',
            //'photo4',
            //'photo5',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
