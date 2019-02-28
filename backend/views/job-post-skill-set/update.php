<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JobPostSkillSet */

$this->title = 'Update Job Post Skill Set: ' . $model->job_post_skill_set_id;
$this->params['breadcrumbs'][] = ['label' => 'Job Post Skill Sets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->job_post_skill_set_id, 'url' => ['view', 'id' => $model->job_post_skill_set_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-post-skill-set-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
