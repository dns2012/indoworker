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
      <?php if(in_array('insert',$privilege)) { ?>
        <?= Html::a('Create Job Location', ['create'], ['class' => 'btn btn-success']) ?>
      <?php ;} ?>
    </p>
    <?php
      if(in_array('view',$privilege)) {$view   = '{view}';} else {$view = '';}
      if(in_array('update',$privilege)) {$update = '{update}';} else {$update = '';}
      if(in_array('delete',$privilege)) {$delete = '{delete}';} else {$delete = '';}
      $control = $view.' '.$update.' '.$delete;
    ?>
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

            ['class' => 'yii\grid\ActionColumn', 'template' => ''.$control.''],
        ],
    ]); ?>
</div>
