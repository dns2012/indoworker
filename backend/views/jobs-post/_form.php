<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\JobLocation;
use backend\models\JobType;
use backend\models\JobPostSkillSet;
use backend\models\UserAdmin;

/* @var $this yii\web\View */
/* @var $model backend\models\JobPost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'job_location_id')->dropDownList(
      ArrayHelper::map(JobLocation::find()->all(),'job_location_id','country_id','city'),
      ['prompt'=>'Select Country']
    )
    ?>

    <?= $form->field($model,'job_type_id')->dropDownList(
      ArrayHelper::map(JobType::find()->all(),'job_type_id','job_description'),
      ['prompt'=>'Select Job Type']
      )?>

    <?= $form->field($model,'job_post_skill_set_id')->dropDownList(
      ArrayHelper::map(JobPostSkillSet::find()->all(),'job_post_skill_set_id','job_post_skill_set_id'),
      ['prompt'=>'Select Skill']
      )?>
      <?= $form->field($model, 'job_title')->textInput() ?>
      <?= $form->field($model, 'job_description')->textarea(['rows' => 6]) ?>
      <?= $form->field($model, 'company')->textInput() ?>
      <?= $form->field($model, 'placement')->textInput() ?>
      <?= $form->field($model, 'contract')->textInput() ?>

      <?= $form->field($model, 'salary')->textInput() ?>
      <?= $form->field($model, 'show_salary')->checkBox(['label' => 'Show Salary','data-size'=>'small', 'class'=>'bs_switch'
      ,'style'=>'margin-bottom:4px;', 'id'=>'show_salary']) ?>

      <?= $form->field($model, 'deduction')->textInput() ?>
      <?= $form->field($model, 'show_deduction')->checkBox(['label' => 'Show Deduction','data-size'=>'small', 'class'=>'bs_switch'
      ,'style'=>'margin-bottom:4px;', 'id'=>'show_deduction']) ?>

      <?= $form->field($model, 'is_active')->checkBox(['label' => 'Is Active','data-size'=>'small', 'class'=>'bs_switch'
      ,'style'=>'margin-bottom:4px;', 'id'=>'is_active']) ?>
      <?= $form->field($model, 'is_available')->checkBox(['label' => 'Is Available','data-size'=>'small', 'class'=>'bs_switch'
        ,'style'=>'margin-bottom:4px;', 'id'=>'is_available']) ?>
      <?= $form->field($model, 'premium_job')->checkBox(['label' => 'Premium Job','data-size'=>'small', 'class'=>'bs_switch'
          ,'style'=>'margin-bottom:4px;', 'id'=>'premium_job']) ?>
      <?= $form->field($model, 'soon_require')->checkBox(['label' => 'Urgent Job','data-size'=>'small', 'class'=>'bs_switch'
              ,'style'=>'margin-bottom:4px;', 'id'=>'soon_require']) ?>

      <?= $form->field($model, 'for_gender')->radio(['label'=>'For Male', 'value'=>'for-male', 'uncheck'=>null])?>
      <?= $form->field($model, 'for_gender')->radio(['label'=>'For Female', 'value'=>'for-female', 'uncheck'=>null])?>
      <?= $form->field($model, 'for_gender')->radio(['label'=>'For Male & Female', 'value'=>'for-male-female', 'uncheck'=>null])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
