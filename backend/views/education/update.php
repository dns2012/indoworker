<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Education */

$this->title = 'Update Education: ' . $model->edu_id;
$this->params['breadcrumbs'][] = ['label' => 'Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->edu_id, 'url' => ['view', 'id' => $model->edu_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="education-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
