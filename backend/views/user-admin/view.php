<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserAdmin */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'User Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-admin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'username',
            // 'auth_key',
            // 'password_hash',
            'password',
            // 'password_reset_token',
            'email:email',
            'roleName',
            // 'status',
            // 'created_at',
            // 'updated_at',
        ],
    ]) ?>

</div>
