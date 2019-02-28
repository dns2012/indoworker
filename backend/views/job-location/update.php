<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JobLocation */

$this->title = 'Update Job Location: ' . $model->job_location_id;
$this->params['breadcrumbs'][] = ['label' => 'Job Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->job_location_id, 'url' => ['view', 'id' => $model->job_location_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-location-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
