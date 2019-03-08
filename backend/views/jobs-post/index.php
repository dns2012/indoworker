<?php

use yii\helpers\Html;
/* use yii\grid\GridView; */
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?php if(in_array('insert',$privilege)) { ?>
        <?= Html::a('Create Job Post', ['create'], ['class' => 'btn btn-success']) ?>
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
          'job_post_id',
          'job_location_id',
          'job_type_id',
          'job_post_skill_set_id',
          'job_description:ntext',
          'salary',
          'is_active',
          'is_available',
          'created_date',
          // $model->getCreatedBy($data['created_by']),
          //'created_by',
          ['class' => 'yii\grid\ActionColumn', 'template' => ''.$control.''],
        ],
]); ?>
</div>
