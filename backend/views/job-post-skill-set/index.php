<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Skill';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-post-skill-set-index" >

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Job Skill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([

        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'job_post_skill_set_id',
            'skill_level',
            'requirement',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
