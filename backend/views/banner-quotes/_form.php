<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BannerQuotes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-quotes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quotes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'others_field')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
