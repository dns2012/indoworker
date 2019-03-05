<?php
use yii\helpers\Html;

use backend\models\JobType;

// Get List Job Type
$listJobType = (new \yii\db\Query())
                ->select(['job_type_id','job_description'])
                ->from('job_type')
                ->all();
$menuJobType = [];
foreach($listJobType as $listJobType) {
  $menuJobType[] = $listJobType['job_type_id'].'-'.$listJobType['job_description'];
}
$countMenuJobType = count($menuJobType);

// Get Admin Menu Access
if(!empty(Yii::$app->user->identity->id)) {
  $listMenuAccess = (new \yii\db\Query())
                    ->select(['menu_id'])
                    ->from('admin_access')
                    ->where(['role_id' =>  Yii::$app->user->identity->role])
                    ->all();
  $menuAccess     = [];
  foreach($listMenuAccess as $listMenuAccess) {
    $menuAccess[] = $listMenuAccess['menu_id'];
  }
} else {
  $menuAccess     = [];
}

/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') {
/**
 * Do not use this code in your template. Remove it.
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            [
              'directoryAsset' => $directoryAsset,
              'menuJobType' =>  $menuJobType,
              'countMenuJobType' => $countMenuJobType,
              'menuAccess'  =>  $menuAccess
            ]
        )
        ?>

        <?= $this->render(
            'content.php',
            [
              'content' => $content,
              'directoryAsset' => $directoryAsset,
            ]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
