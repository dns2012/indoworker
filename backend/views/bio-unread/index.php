<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BannerQuotes */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bio Unread';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bio-unread-index">
    <h1><?= $jobType['job_description']?></h1>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Tanggal Apply</th>
          <th>HP/WA</th>
          <th>Priority</th>
          <th>Kota</th>
          <th class="action-column">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($dataJobPostActivity as $index => $data) { ?>
          <tr>
            <td><?= $index+1;?></td>
            <td><?= $data['name']?></td>
            <td><?= $data['apply_date'];?></td>
            <td><?= $data['phone']?></td>
            <td><?= $model->labelPriority($data['job_priority'])?></td>
            <td><?= $data['address']?></td>
            <td>
              <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalReject<?=$index+1?>">REJECT</button>
              <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modalAccept<?=$index+1?>">ACCEPT</button>
              <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#modalAcceptOJT<?=$index+1?>">ACCEPT OTHER JOB TYPE</button>
            </td>
          </tr>
          <div id="modalReject<?=$index+1?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Reject Confirmation</h4>
                </div>
                <div class="modal-body">
                  <h5>Are you sure reject this applicant?</h5>
                </div>
                <div class="modal-footer">
                  <a href="<?= Url::to(['bio-unread/reject?id='.$data['id'].'&menu='.$jobType['job_type_id']]) ?>" class="btn btn-danger">Reject</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>
          <div id="modalAccept<?=$index+1?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Accept Confirmation</h4>
                </div>
                <div class="modal-body">
                  <h5>Are you sure accept this applicant?</h5>
                </div>
                <div class="modal-footer">
                  <a href="<?= Url::to(['bio-unread/accept?id='.$data['id'].'&menu='.$jobType['job_type_id']]) ?>" class="btn btn-success">Accept</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>
          <div id="modalAcceptOJT<?=$index+1?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Accept Other Job Type Confirmation</h4>
                </div>
                <?php ActiveForm::begin(['method'  =>  'post','action'  =>  Url::to(['bio-unread/acceptojt?id='.$data['id'].'&menu='.$jobType['job_type_id']])]);?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Select other job :</label>
                      <select class="form-control" name="job" required>
                        <option value="">Choose options</option>
                        <?php for($ojt=0;$ojt<$countOJT;$ojt++) { ?>
                          <option value="<?=$otherJobType[$ojt]['job_type_id']?>"><?=$otherJobType[$ojt]['job_description']?></option>
                        <?php ;} ?>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Accept Other Job Type</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                <?php ActiveForm::end(); ?>
              </div>
            </div>
          </div>
        <?php ;} ?>
      </tbody>
    </table>
  </div>
</div>
