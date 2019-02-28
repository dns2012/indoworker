<?php
  // if (!isset(Yii::$app->user->identity->id))
  // {
  //   return $this->redirect(['login']);
  // }
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                 <p> <?php if (isset(Yii::$app->user->identity->first_name)){ echo Yii::$app->user->identity->first_name .' ' . Yii::$app->user->identity->last_name;} ?> </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Home',  'options' => ['class' => 'header']],

                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    [
                        'label' => 'Transaction',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Job Post', 'icon' => '', 'url' => ['/jobs-post'],],
                            ['label' => 'News', 'icon' => '', 'url' => ['/news'],],
                          ],
                    ],

                    [
                        'label' => 'Master',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Currency', 'icon' => '', 'url' => ['/currency'],],
                            ['label' => 'Country', 'icon' => '', 'url' => ['/country'],],
                            ['label' => 'Job Type', 'icon' => '', 'url' => ['/job-type'],],
                            ['label' => 'Job Location', 'icon' => '', 'url' => ['/job-location'],],
                            ['label' => 'Job Skill', 'icon' => '', 'url' => ['/job-post-skill-set'],],

                            ['label' => 'News Category', 'icon' => '', 'url' => ['/news-category'],],

                            ['label' => 'Facility', 'icon' => '', 'url' => ['/facility'],],
                            ['label' => 'Frequently Asked Question(FAQ)', 'icon' => '', 'url' => ['/faq'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
