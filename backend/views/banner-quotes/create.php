<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BannerQuotes */

$this->title = 'Create Banner Quotes';
$this->params['breadcrumbs'][] = ['label' => 'Banner Quotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-quotes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
