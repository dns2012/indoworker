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
      <?php if(in_array('insert',$privilege)) { ?>
        <?= Html::a('Create Job Type', ['create'], ['class' => 'btn btn-success']) ?>
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
            ['class' => 'yii\grid\ActionColumn', 'template' => ''.$control.''],
        ],
    ]); ?>
</div>
