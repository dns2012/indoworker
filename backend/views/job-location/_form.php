<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Country;

/* @var $this yii\web\View */
/* @var $model backend\models\JobLocation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-location-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'country_id')->dropDownList(
      ArrayHelper::map(Country::find()->all(),'country_id','description'),
      ['prompt'=>'Select Country']
      )?>

    <?= $form->field($model, 'street_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>




    <?= $form->field($model, 'zip')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
