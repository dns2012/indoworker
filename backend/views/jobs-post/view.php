<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\JobPost */

$this->title = $model->job_post_id;
$this->params['breadcrumbs'][] = ['label' => 'Job Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="job-post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->job_post_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->job_post_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'job_post_id',
            'job_location_id',
            'job_type_id',
            'job_post_skill_set_id',
            'company',
            'placement',
            'job_title',
            'job_description:ntext',
            'salary',
            'show_salary',
            'deduction',
            'show_deduction',
            'is_active',
            'is_available',
            'premium_job',
            'soon_require',
            'for_gender',
            'created_date',
            'created_by',
        ],
    ]) ?>

</div>
