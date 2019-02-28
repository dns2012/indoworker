<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JobType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-type-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'job_description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'group_type')->radio(['label'=>'CareGiver', 'value'=>'CareGiver', 'uncheck'=>null])?>
    <?= $form->field($model, 'group_type')->radio(['label'=>'Non CareGiver/Industri', 'value'=>'Non CareGiver/Industri', 'uncheck'=>null])?>
    <?= $form->field($model, 'min_edu')->textInput() ?>
    <?= $form->field($model, 'age_min')->textInput() ?>
    <?= $form->field($model, 'age_max')->textInput() ?>
    <?= $form->field($model, 'height')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
