<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BannerQuotes */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banner Quotes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-quotes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Banner Quotes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'quotes:ntext',
            'name',
            'company',
            'photos',
            //'others_field',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
