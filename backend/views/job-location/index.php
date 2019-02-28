<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Location';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-location-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Job Location', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'job_location_id',
            'country_id',
            'city',
            'state',
            'street_address',
            //'zip',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
