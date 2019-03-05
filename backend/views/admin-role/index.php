<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-role-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Admin Role', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',

            [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{view} {update} {delete} {role}',
              'buttons' => [
                'role' => function($url, $model) {
              	    return Html::a('<span class="btn btn-sm btn-success">PRIVILEGE</span>', ['/admin-privilege', 'role' => $model['id']]);
              	}
              ]
            ],
        ],
    ]); ?>
</div>
