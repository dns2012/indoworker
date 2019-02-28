<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JobType */

$this->title = 'Create Job Type';
$this->params['breadcrumbs'][] = ['label' => 'Job Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
