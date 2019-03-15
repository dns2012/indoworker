<?php
use yii\helpers\Html;

use backend\models\JobType;

// Avoid Point Link
if(!empty(Yii::$app->user->identity)) {
  if(Yii::$app->user->identity->role != 1) {
    $thisController = Yii::$app->controller->id;
    $requestedRoute = Yii::$app->controller->module->requestedRoute;
    if($thisController != 'site') {
      $actionAccess = (new \yii\db\Query())
                      ->select(['menu_id'])
                      ->from('admin_access')
                      ->where(['role_id' => Yii::$app->user->identity->role])
                      ->andWhere(['menu_id' => $thisController])
                      ->one();
      if(!empty($actionAccess)) {
        $specialController = ['bio-unread', 'bio-rejected', 'bio-job-confirmed', 'bio-trash', 'bio-recall'];
        if(in_array($thisController,$specialController)) {
          $actionParams = Yii::$app->controller->actionParams['id'];
          $actionRequest = $thisController."?id=".$actionParams;
          $thisPrivilege = (new \yii\db\Query())
                            ->select(['menu_id'])
                            ->from('admin_access')
                            ->where(['role_id' => Yii::$app->user->identity->role])
                            ->andWhere(['menu_id' => $actionRequest])
                            ->one();
          if(empty($thisPrivilege)) {
            $message = "You don't have permission to access <strong>".$actionRequest."</strong>";
            Yii::$app->session->setFlash('warning', $message);
            return Yii::$app->response->redirect(['site/home']);
          }
        } else {
          $thisPrivilege = (new \yii\db\Query())
                            ->select(['*'])
                            ->from('admin_privilege')
                            ->where(['role_id'  =>  Yii::$app->user->identity->role])
                            ->andWhere(['menu_id' => $thisController])
                            ->one();
          $actionPrivilege = explode(',', $thisPrivilege['privilege']);
          $exRequestedRoute = explode('/', $requestedRoute);
          if(!empty($exRequestedRoute[1])) {
            if($exRequestedRoute[1] == 'create') {
              $moduleRoute = 'insert';
            } else {
              $moduleRoute = $exRequestedRoute[1];
            }
            if($moduleRoute != 'index') {
              if(!in_array($moduleRoute,$actionPrivilege)) {
                $message = "You don't have permission to access <strong>".$requestedRoute."</strong>";
                Yii::$app->session->setFlash('warning', $message);
                return Yii::$app->response->redirect(['site/home']);
              }
            }
          }
        }
      } else {
        $message = "You don't have permission to access <strong>".$requestedRoute."</strong>";
        Yii::$app->session->setFlash('warning', $message);
        return Yii::$app->response->redirect(['site/home']);
      }
    }
  }
}



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
<script>
  jQuery(document).ready(function($) {
    $("#checkall").click(function() {
      if($(this).prop('checked')) {
        $("input:checkbox").attr('checked', 'checked');
      } else {
        $("input:checkbox").removeAttr('checked');
      }
    })

    $('[name="menu[]"]').click(function() {
      let val = $(this).val();
      if($(this).prop('checked')) {
        $("."+val).attr('checked', 'checked');
      } else {
        $("."+val).removeAttr('checked');
      }
    })
  })
</script>
