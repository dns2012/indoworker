<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JobPostSkillSet */

$this->title = 'Create Job Skill';
$this->params['breadcrumbs'][] = ['label' => 'Job Skill', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-post-skill-set-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
