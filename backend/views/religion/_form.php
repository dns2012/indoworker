<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Religion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="religion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID')->textInput(['maxlength' => true, 'readonly' => !$model->isNewRecord]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
