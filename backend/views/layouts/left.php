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
          <?php if(Yii::$app->user->identity->role == 1) { ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Admin</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="/indoworker/backend/web/index.php/admin-role"><i class="fa fa-tasks"></i>  <span>Admin Role</span></a></li>
                <li><a href="/indoworker/backend/web/index.php/user-admin"><i class="fa fa-user"></i>  <span>Admin User</span></a></li>
              </ul>
            </li>
          <?php ;} ?>
          <?php if(in_array('transaction',$menuAccess)) { ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-exchange"></i> <span>Transaction</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li <?=(!in_array('jobs-post',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/jobs-post"><i class="fa fa-tags"></i>  <span>Job Post</span></a></li>
              <li <?=(!in_array('news',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/news"><i class="fa fa-newspaper-o"></i>  <span>News</span></a></li>
            </ul>
          </li>
          <?php ;} ?>
          <?php if(in_array('master',$menuAccess)) { ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-database"></i>  <span>Master</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li <?=(!in_array('currency',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/currency"><i class="fa fa-money"></i>  <span>Currency</span></a></li>
              <li <?=(!in_array('country',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/country"><i class="fa fa-flag"></i>  <span>Country</span></a></li>
              <li <?=(!in_array('education',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/education"><i class="fa fa-graduation-cap"></i>  <span>Education</span></a></li>
              <li <?=(!in_array('religion',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/religion"><i class="fa fa-heart"></i>  <span>Religion</span></a></li>
              <li <?=(!in_array('job-type',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/job-type"><i class="fa fa-road"></i>  <span>Job Type</span></a></li>
              <li <?=(!in_array('job-location',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/job-location"><i class="fa fa-map"></i>  <span>Job Location</span></a></li>
              <li <?=(!in_array('job-post-skill-set',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/job-post-skill-set"><i class="fa fa-laptop"></i>  <span>Job Skill</span></a></li>
              <li <?=(!in_array('news-category',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/news-category"><i class="fa fa-list"></i>  <span>News Category</span></a></li>
              <li <?=(!in_array('facility',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/facility"><i class="fa fa-building-o"></i>  <span>Facility</span></a></li>
              <li <?=(!in_array('faq',$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/faq"><i class="fa fa-question"></i>  <span>FAQ</span></a></li>
            </ul>
          </li>
          <?php ;} ?>
          <?php if(in_array('bio-unread',$menuAccess)) { ?>
          <li class="treeview">
            <a href="#"><i class="fa fa-envelope"></i>  <span>Bio Unread</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <?php for($mjt=0;$mjt<$countMenuJobType;$mjt++) {
                $exmjt = explode('-', $menuJobType[$mjt]);
                $valjt = "bio-unread?id=".$exmjt[0];
              ?>
              <li <?=(!in_array($valjt,$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/bio-unread?id=<?= $exmjt[0]?>"><i class="fa fa-circle-o"></i>  <span><?= $exmjt[1]?></span></a></li>
              <?php ;} ?>
            </ul>
          </li>
          <?php ;} ?>
          <?php if(in_array('bio-rejected',$menuAccess)) { ?>
          <li class="treeview">
            <a href="#"><i class="fa fa-ban"></i>  <span>Rejected</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <?php for($mjt=0;$mjt<$countMenuJobType;$mjt++) {
                $exmjt = explode('-', $menuJobType[$mjt]);
                $valjt = "bio-rejected?id=".$exmjt[0];
              ?>
              <li <?=(!in_array($valjt,$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/bio-rejected?id=<?= $exmjt[0]?>"><i class="fa fa-circle-o"></i>  <span><?= $exmjt[1]?></span></a></li>
              <?php ;} ?>
            </ul>
          </li>
          <?php ;} ?>
          <?php if(in_array('bio-job-confirmed',$menuAccess)) { ?>
          <li class="treeview">
            <a href="#"><i class="fa fa-check"></i>  <span>Job</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <?php for($mjt=0;$mjt<$countMenuJobType;$mjt++) {
                $exmjt = explode('-', $menuJobType[$mjt]);
                $valjt = "bio-job-confirmed?id=".$exmjt[0];
              ?>
              <li <?=(!in_array($valjt,$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/bio-job-confirmed?id=<?= $exmjt[0]?>"><i class="fa fa-circle-o"></i>  <span><?= $exmjt[1]?></span></a></li>
              <?php ;} ?>
            </ul>
          </li>
          <?php ;} ?>
          <?php if(in_array('bio-trash',$menuAccess)) { ?>
          <li class="treeview">
            <a href="#"><i class="fa fa-trash"></i>  <span>Trash</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <?php for($mjt=0;$mjt<$countMenuJobType;$mjt++) {
                $exmjt = explode('-', $menuJobType[$mjt]);
                $valjt = "bio-trash?id=".$exmjt[0];
              ?>
              <li <?=(!in_array($valjt,$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/bio-trash?id=<?= $exmjt[0]?>"><i class="fa fa-circle-o"></i>  <span><?= $exmjt[1]?></span></a></li>
              <?php ;} ?>
            </ul>
          </li>
          <?php ;} ?>
          <?php if(in_array('bio-recall',$menuAccess)) { ?>
          <li class="treeview">
            <a href="#"><i class="fa fa-phone"></i>  <span>Recall</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <?php for($mjt=0;$mjt<$countMenuJobType;$mjt++) {
                $exmjt = explode('-', $menuJobType[$mjt]);
                $valjt = "bio-recall?id=".$exmjt[0];
              ?>
              <li <?=(!in_array($valjt,$menuAccess))?"style='display:none'":""?>><a href="/indoworker/backend/web/index.php/bio-recall?id=<?= $exmjt[0]?>"><i class="fa fa-circle-o"></i>  <span><?= $exmjt[1]?></span></a></li>
              <?php ;} ?>
            </ul>
          </li>
          <?php ;} ?>
        </ul>

    </section>

</aside>
