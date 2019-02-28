<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Facility */

$this->title = 'Update Facility: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Facilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->facility_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="facility-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
