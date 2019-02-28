<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JobType */

$this->title = 'Update Job Type: ' . $model->job_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Job Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->job_type_id, 'url' => ['view', 'id' => $model->job_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
