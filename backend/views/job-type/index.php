<?php

use yii\helpers\Html;
/* use yii\grid\GridView; */
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Job Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'responsive'=>true,
        'hover'=>true,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'job_type_id',
            'job_description:ntext',
            'group_type',
            'min_edu',
            'age_min',
            'age_max',
            'height',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
