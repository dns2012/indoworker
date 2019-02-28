<?php
use yii\helpers\Html;
use yii\backend\UserAdmin;
/* @var $this \yii\web\View */
/* @var $content string */
  // if (!isset(Yii::$app->user->identity->id))
  // {
  //   return $this->redirect(['login']);
  // }

?>
<header class="main-header">
    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/avatar5.png" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?php if (isset(Yii::$app->user->identity->first_name)){ echo Yii::$app->user->identity->first_name .' ' . Yii::$app->user->identity->last_name;} ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle"
                                 alt="User Image"/>
                            <p>
                                <?php if(isset(Yii::$app->user->identity->username))
                                      {
                                          echo Yii::$app->user->identity->username;
                                      }
                                ?>
                                <small> <?php
                                  if (isset(Yii::$app->user->identity->email))
                                  {
                                    echo Yii::$app->user->identity->email;
                                  }
                                ?> </small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">*</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">*</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">*</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat"></a> <!-- Profile -->
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
