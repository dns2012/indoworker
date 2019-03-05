<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?php if(in_array('insert',$privilege)) { ?>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
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
            ['class' => 'yii\grid\SerialColumn'],

            'country_id',
            'description',
            'currency_id',
            'rupiah',

            ['class' => 'yii\grid\ActionColumn', 'template' => ''.$control.''],
        ],
    ]); ?>
</div>
