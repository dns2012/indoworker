<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JobPost */

$this->title = 'Update Job Post: ' . $model->job_post_id;
$this->params['breadcrumbs'][] = ['label' => 'Job Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->job_post_id, 'url' => ['view', 'id' => $model->job_post_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
