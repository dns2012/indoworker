<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BannerQuotes */

$this->title = 'Update Banner Quotes: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Banner Quotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banner-quotes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
