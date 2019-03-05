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

        <?php /* dmstr\widgets\Menu::widget(
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

                    [
                        'label' => 'Bio Unread',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => $menuJobType,
                    ],
                ],
            ]
        ) */ ?>

        <ul class="sidebar-menu tree" data-widget="tree">
          <li class="header"><span><span>Home</span></span></li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>Admin</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="/indoworker/backend/web/index.php/admin-role"><i class="fa fa-circle-o"></i>  <span>Admin System</span></a></li>
            </ul>
          </li>
          <?php if(in_array('transaction',$menuAccess)) { ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>Transaction</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li <?=(!in_array('jobs-post',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/jobs-post"><i class="fa fa-circle-o"></i>  <span>Job Post</span></a></li>
              <li <?=(!in_array('news',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/news"><i class="fa fa-circle-o"></i>  <span>News</span></a></li>
            </ul>
          </li>
          <?php ;} ?>

          <?php if(in_array('master',$menuAccess)) { ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i>  <span>Master</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li <?=(!in_array('currency',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/currency"><i class="fa fa-circle-o"></i>  <span>Currency</span></a></li>
              <li <?=(!in_array('country',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/country"><i class="fa fa-circle-o"></i>  <span>Country</span></a></li>
              <li <?=(!in_array('job-type',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/job-type"><i class="fa fa-circle-o"></i>  <span>Job Type</span></a></li>
              <li <?=(!in_array('job-location',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/job-location"><i class="fa fa-circle-o"></i>  <span>Job Location</span></a></li>
              <li <?=(!in_array('job-post-skill-set',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/job-post-skill-set"><i class="fa fa-circle-o"></i>  <span>Job Skill</span></a></li>
              <li <?=(!in_array('news-category',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/news-category"><i class="fa fa-circle-o"></i>  <span>News Category</span></a></li>
              <li <?=(!in_array('facility',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/facility"><i class="fa fa-circle-o"></i>  <span>Facility</span></a></li>
              <li <?=(!in_array('faq',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/faq"><i class="fa fa-circle-o"></i>  <span>Frequently Asked Question(FAQ)</span></a></li>
            </ul>
          </li>
          <?php ;} ?>
          <li class="treeview">
            <a href="#"><i class="fa fa-share"></i>  <span>Bio Unread</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <?php for($mjt=0;$mjt<$countMenuJobType;$mjt++) {
                $exmjt = explode('-', $menuJobType[$mjt]);
              ?>
              <li><a href="/indoworker/backend/web/index.php/bio-unread?id=<?= $exmjt[0]?>"><i class="fa fa-circle-o"></i>  <span><?= $exmjt[1]?></span></a></li>
              <?php ;} ?>
            </ul>
          </li>
        </ul>

    </section>

</aside>
