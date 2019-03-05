<?php

use yii\helpers\Html;
/* use yii\grid\GridView; */
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?php if(in_array('insert',$privilege)) { ?>
        <?= Html::a('Create Faq', ['create'], ['class' => 'btn btn-success']) ?>
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
          //  ['class' => 'yii\grid\SerialColumn'],
            'faq_id',
            'title',
            'content:ntext',
            'created_date',
            //'created_by',

            ['class' => 'yii\grid\ActionColumn', 'template' => ''.$control.''],
        ],
    ]); ?>
</div>
