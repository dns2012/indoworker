<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JobPostSkillSet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-post-skill-set-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'job_post_skill_set_id')->textInput(['maxlength' => true, 'readonly' => !$model->isNewRecord]) ?>

    <?= $form->field($model, 'skill_level')->textInput() ?>

    <?= $form->field($model, 'requirement')->textArea(['rows' => '6']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
