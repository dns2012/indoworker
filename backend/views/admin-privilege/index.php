<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BannerQuotes */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin Privilege';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bio-unread-index">
  <div class="row">
    <div class="col-md-12">
      <input type="checkbox" name="" value="" id="checkall" value="1"> CHECK ALL
    </div>
    <div class="col-md-12">
      <?php ActiveForm::begin(['method'  =>  'post','action'  =>  Url::to(['admin-privilege/add?role='.$role])]);?>
        <table class="table table-bordered">
          <thead>
            <th>No</th>
            <th>Master Menu</th>
            <th>Sub Menu</th>
          </thead>
          <tbody>
            <!-- Transaction Menu  -->
            <tr>
              <td>1</td>
              <td>
                <input type="checkbox" name="menu[]" value="transaction" <?=(!empty($menu))?(in_array('transaction',$menu))?"checked":"":""?>> Transaction
              </td>
              <td>
                <table class="table table-bordered">
                  <thead>
                    <th>Menu</th>
                    <th>Insert</th>
                    <th>View</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="checkbox" class="transaction" name="submenu[]" value="jobs-post" <?=(!empty($menu))?(in_array('jobs-post',$menu))?"checked":"":""?>> Job Post</td>
                      <td><input type="checkbox" class="transaction" name="jobs-post[]" value="insert" <?=(!empty($privilege['jobs-post']))?(in_array('insert',$privilege['jobs-post']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="transaction" name="jobs-post[]" value="view" <?=(!empty($privilege['jobs-post']))?(in_array('view',$privilege['jobs-post']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="transaction" name="jobs-post[]" value="update" <?=(!empty($privilege['jobs-post']))?(in_array('update',$privilege['jobs-post']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="transaction" name="jobs-post[]" value="delete" <?=(!empty($privilege['jobs-post']))?(in_array('delete',$privilege['jobs-post']))?"checked":"":""?>></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" class="transaction" name="submenu[]" value="news" <?=(!empty($menu))?(in_array('news',$menu))?"checked":"":""?>> News</td>
                      <td><input type="checkbox" class="transaction" name="news[]" value="insert" <?=(!empty($privilege['news']))?(in_array('insert',$privilege['news']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="transaction" name="news[]" value="view" <?=(!empty($privilege['news']))?(in_array('view',$privilege['news']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="transaction" name="news[]" value="update" <?=(!empty($privilege['news']))?(in_array('update',$privilege['news']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="transaction" name="news[]" value="delete" <?=(!empty($privilege['news']))?(in_array('delete',$privilege['news']))?"checked":"":""?>></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>

            <!-- Master Menu  -->
            <tr>
              <td>2</td>
              <td>
                <input type="checkbox" name="menu[]" value="master" <?=(!empty($menu))?(in_array('master',$menu))?"checked":"":""?>> Master
              </td>
              <td>
                <table class="table table-bordered">
                  <thead>
                    <th>Menu</th>
                    <th>Insert</th>
                    <th>View</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="checkbox" class="master" name="submenu[]" value="currency" <?=(!empty($menu))?(in_array('currency',$menu))?"checked":"":""?>> Currency</td>
                      <td><input type="checkbox" class="master" name="currency[]" value="insert" <?=(!empty($privilege['currency']))?(in_array('insert',$privilege['currency']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="currency[]" value="view" <?=(!empty($privilege['currency']))?(in_array('view',$privilege['currency']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="currency[]" value="update" <?=(!empty($privilege['currency']))?(in_array('update',$privilege['currency']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="currency[]" value="delete" <?=(!empty($privilege['currency']))?(in_array('delete',$privilege['currency']))?"checked":"":""?>></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" class="master" name="submenu[]" value="country" <?=(!empty($menu))?(in_array('country',$menu))?"checked":"":""?>> Country</td>
                      <td><input type="checkbox" class="master" name="country[]" value="insert" <?=(!empty($privilege['country']))?(in_array('insert',$privilege['country']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="country[]" value="view" <?=(!empty($privilege['country']))?(in_array('view',$privilege['country']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="country[]" value="update" <?=(!empty($privilege['country']))?(in_array('update',$privilege['country']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="country[]" value="delete" <?=(!empty($privilege['country']))?(in_array('delete',$privilege['country']))?"checked":"":""?>></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" class="master" name="submenu[]" value="education" <?=(!empty($menu))?(in_array('education',$menu))?"checked":"":""?>> Education</td>
                      <td><input type="checkbox" class="master" name="education[]" value="insert" <?=(!empty($privilege['education']))?(in_array('insert',$privilege['education']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="education[]" value="view" <?=(!empty($privilege['education']))?(in_array('view',$privilege['education']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="education[]" value="update" <?=(!empty($privilege['education']))?(in_array('update',$privilege['education']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="education[]" value="delete" <?=(!empty($privilege['education']))?(in_array('delete',$privilege['education']))?"checked":"":""?>></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" class="master" name="submenu[]" value="religion" <?=(!empty($menu))?(in_array('religion',$menu))?"checked":"":""?>> Religion</td>
                      <td><input type="checkbox" class="master" name="religion[]" value="insert" <?=(!empty($privilege['religion']))?(in_array('insert',$privilege['religion']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="religion[]" value="view" <?=(!empty($privilege['religion']))?(in_array('view',$privilege['religion']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="religion[]" value="update" <?=(!empty($privilege['religion']))?(in_array('update',$privilege['religion']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="religion[]" value="delete" <?=(!empty($privilege['religion']))?(in_array('delete',$privilege['religion']))?"checked":"":""?>></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" class="master" name="submenu[]" value="job-type" <?=(!empty($menu))?(in_array('job-type',$menu))?"checked":"":""?>> Job Type</td>
                      <td><input type="checkbox" class="master" name="job-type[]" value="insert" <?=(!empty($privilege['job-type']))?(in_array('insert',$privilege['job-type']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="job-type[]" value="view" <?=(!empty($privilege['job-type']))?(in_array('view',$privilege['job-type']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="job-type[]" value="update" <?=(!empty($privilege['job-type']))?(in_array('update',$privilege['job-type']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="job-type[]" value="delete" <?=(!empty($privilege['job-type']))?(in_array('delete',$privilege['job-type']))?"checked":"":""?>></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" class="master" name="submenu[]" value="job-location" <?=(!empty($menu))?(in_array('job-location',$menu))?"checked":"":""?>> Job Location</td>
                      <td><input type="checkbox" class="master" name="job-location[]" value="insert" <?=(!empty($privilege['job-location']))?(in_array('insert',$privilege['job-location']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="job-location[]" value="view" <?=(!empty($privilege['job-location']))?(in_array('view',$privilege['job-location']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="job-location[]" value="update" <?=(!empty($privilege['job-location']))?(in_array('update',$privilege['job-location']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="job-location[]" value="delete" <?=(!empty($privilege['job-location']))?(in_array('delete',$privilege['job-location']))?"checked":"":""?>></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" class="master" name="submenu[]" value="job-post-skill-set" <?=(!empty($menu))?(in_array('job-post-skill-set',$menu))?"checked":"":""?>> Job Skill</td>
                      <td><input type="checkbox" class="master" name="job-post-skill-set[]" value="insert" <?=(!empty($privilege['job-post-skill-set']))?(in_array('insert',$privilege['job-post-skill-set']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="job-post-skill-set[]" value="view" <?=(!empty($privilege['job-post-skill-set']))?(in_array('view',$privilege['job-post-skill-set']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="job-post-skill-set[]" value="update" <?=(!empty($privilege['job-post-skill-set']))?(in_array('update',$privilege['job-post-skill-set']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="job-post-skill-set[]" value="delete" <?=(!empty($privilege['job-post-skill-set']))?(in_array('delete',$privilege['job-post-skill-set']))?"checked":"":""?>></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" class="master" name="submenu[]" value="news-category" <?=(!empty($menu))?(in_array('news-category',$menu))?"checked":"":""?>> News Category</td>
                      <td><input type="checkbox" class="master" name="news-category[]" value="insert" <?=(!empty($privilege['news-category']))?(in_array('insert',$privilege['news-category']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="news-category[]" value="view" <?=(!empty($privilege['news-category']))?(in_array('view',$privilege['news-category']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="news-category[]" value="update" <?=(!empty($privilege['news-category']))?(in_array('update',$privilege['news-category']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="news-category[]" value="delete" <?=(!empty($privilege['news-category']))?(in_array('delete',$privilege['news-category']))?"checked":"":""?>></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" class="master" name="submenu[]" value="facility" <?=(!empty($menu))?(in_array('facility',$menu))?"checked":"":""?>> Facility</td>
                      <td><input type="checkbox" class="master" name="facility[]" value="insert" <?=(!empty($privilege['facility']))?(in_array('insert',$privilege['facility']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="facility[]" value="view" <?=(!empty($privilege['facility']))?(in_array('view',$privilege['facility']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="facility[]" value="update" <?=(!empty($privilege['facility']))?(in_array('update',$privilege['facility']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="facility[]" value="delete" <?=(!empty($privilege['facility']))?(in_array('delete',$privilege['facility']))?"checked":"":""?>></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" class="master" name="submenu[]" value="faq" <?=(!empty($menu))?(in_array('faq',$menu))?"checked":"":""?>> Frequently Asked Question(FAQ)</td>
                      <td><input type="checkbox" class="master" name="faq[]" value="insert" <?=(!empty($privilege['faq']))?(in_array('insert',$privilege['faq']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="faq[]" value="view" <?=(!empty($privilege['faq']))?(in_array('view',$privilege['faq']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="faq[]" value="update" <?=(!empty($privilege['faq']))?(in_array('update',$privilege['faq']))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="master" name="faq[]" value="delete" <?=(!empty($privilege['faq']))?(in_array('delete',$privilege['faq']))?"checked":"":""?>></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>

            <!-- Bio Unread Menu  -->
            <tr>
              <td>3</td>
              <td>
                <input type="checkbox" name="menu[]" value="bio-unread" <?=(!empty($menu))?(in_array('bio-unread',$menu))?"checked":"":""?>> Bio Unread
              </td>
              <td>
                <table class="table table-bordered">
                  <thead>
                    <th>Menu</th>
                    <th>Reject</th>
                    <th>Accept</th>
                    <th>Accept Other Job Type</th>
                  </thead>
                  <tbody>
                    <?php for($jt=0;$jt<$count_job_type;$jt++) {
                      $exjt = explode('-', $job_type[$jt]);
                      $valjt = "bio-unread?id=".$exjt[0];
                    ?>
                    <tr>
                      <td><input type="checkbox" class="bio-unread" name="submenu[]" value="<?=$valjt?>" <?=(!empty($menu))?(in_array($valjt,$menu))?"checked":"":""?>> <?=$exjt[1]?></td>
                      <td><input type="checkbox" class="bio-unread" name="<?=$valjt?>[]" value="reject" <?=(!empty($privilege[$valjt]))?(in_array('reject',$privilege[$valjt]))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="bio-unread" name="<?=$valjt?>[]" value="accept" <?=(!empty($privilege[$valjt]))?(in_array('accept',$privilege[$valjt]))?"checked":"":""?>></td>
                      <td><input type="checkbox" class="bio-unread" name="<?=$valjt?>[]" value="acceptojt" <?=(!empty($privilege[$valjt]))?(in_array('acceptojt',$privilege[$valjt]))?"checked":"":""?>></td>
                    </tr>
                    <?php ;} ?>
                  </tbody>
                </table>
              </td>
            </tr>

            <!-- Bio Reject Menu  -->
            <tr>
              <td>4</td>
              <td>
                <input type="checkbox" name="menu[]" value="bio-rejected" <?=(!empty($menu))?(in_array('bio-rejected',$menu))?"checked":"":""?>> Rejected
              </td>
              <td>
                <table class="table table-bordered">
                  <thead>
                    <th>Menu</th>
                  </thead>
                  <tbody>
                    <?php for($jt=0;$jt<$count_job_type;$jt++) {
                      $exjt = explode('-', $job_type[$jt]);
                      $valjt = "bio-rejected?id=".$exjt[0];
                    ?>
                    <tr>
                      <td><input type="checkbox" class="bio-rejected" name="submenu[]" value="<?=$valjt?>" <?=(!empty($menu))?(in_array($valjt,$menu))?"checked":"":""?>> <?=$exjt[1]?></td>
                    </tr>
                    <?php ;} ?>
                  </tbody>
                </table>
              </td>
            </tr>

            <!-- Bio Job Confirmed Menu  -->
            <tr>
              <td>5</td>
              <td>
                <input type="checkbox" name="menu[]" value="bio-job-confirmed" <?=(!empty($menu))?(in_array('bio-job-confirmed',$menu))?"checked":"":""?>> Job
              </td>
              <td>
                <table class="table table-bordered">
                  <thead>
                    <th>Menu</th>
                    <th>Move to Trash</th>
                  </thead>
                  <tbody>
                    <?php for($jt=0;$jt<$count_job_type;$jt++) {
                      $exjt = explode('-', $job_type[$jt]);
                      $valjt = "bio-job-confirmed?id=".$exjt[0];
                    ?>
                    <tr>
                      <td><input type="checkbox" class="bio-job-confirmed" name="submenu[]" value="<?=$valjt?>" <?=(!empty($menu))?(in_array($valjt,$menu))?"checked":"":""?>> <?=$exjt[1]?></td>
                      <td><input type="checkbox" class="bio-job-confirmed" name="<?=$valjt?>[]" value="movetotrash" <?=(!empty($privilege[$valjt]))?(in_array('movetotrash',$privilege[$valjt]))?"checked":"":""?>></td>
                    </tr>
                    <?php ;} ?>
                  </tbody>
                </table>
              </td>
            </tr>

            <!-- Bio Trash Menu  -->
            <tr>
              <td>6</td>
              <td>
                <input type="checkbox" name="menu[]" value="bio-trash" <?=(!empty($menu))?(in_array('bio-trash',$menu))?"checked":"":""?>> Trash
              </td>
              <td>
                <table class="table table-bordered">
                  <thead>
                    <th>Menu</th>
                    <th>Recall</th>
                  </thead>
                  <tbody>
                    <?php for($jt=0;$jt<$count_job_type;$jt++) {
                      $exjt = explode('-', $job_type[$jt]);
                      $valjt = "bio-trash?id=".$exjt[0];
                    ?>
                    <tr>
                      <td><input type="checkbox" class="bio-trash" name="submenu[]" value="<?=$valjt?>" <?=(!empty($menu))?(in_array($valjt,$menu))?"checked":"":""?>> <?=$exjt[1]?></td>
                      <td><input type="checkbox" class="bio-trash" name="<?=$valjt?>[]" value="recall" <?=(!empty($privilege[$valjt]))?(in_array('recall',$privilege[$valjt]))?"checked":"":""?>></td>
                    </tr>
                    <?php ;} ?>
                  </tbody>
                </table>
              </td>
            </tr>

            <!-- Bio Recall Menu  -->
            <tr>
              <td>7</td>
              <td>
                <input type="checkbox" name="menu[]" value="bio-recall" <?=(!empty($menu))?(in_array('bio-recall',$menu))?"checked":"":""?>> Recall
              </td>
              <td>
                <table class="table table-bordered">
                  <thead>
                    <th>Menu</th>
                  </thead>
                  <tbody>
                    <?php for($jt=0;$jt<$count_job_type;$jt++) {
                      $exjt = explode('-', $job_type[$jt]);
                      $valjt = "bio-recall?id=".$exjt[0];
                    ?>
                    <tr>
                      <td><input type="checkbox" class="bio-recall" name="submenu[]" value="<?=$valjt?>" <?=(!empty($menu))?(in_array($valjt,$menu))?"checked":"":""?>> <?=$exjt[1]?></td>
                    </tr>
                    <?php ;} ?>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
        <button type="submit" class="btn btn-success">SUBMIT</button>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
