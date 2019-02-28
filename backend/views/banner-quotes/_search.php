<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\BannerQuotes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-quotes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'quotes') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'company') ?>

    <?= $form->field($model, 'photos') ?>

    <?php // echo $form->field($model, 'others_field') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
