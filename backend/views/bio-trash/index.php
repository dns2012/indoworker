<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BannerQuotes */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trash Data';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bio-trash-index">
    <h1><?= $jobType['job_description']?></h1>
    <?php
      if(!in_array('recall',$privilege)) {$recall = "style='display:none'";} else {$recall = "";}
    ?>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Tanggal Apply</th>
          <th>HP/WA</th>
          <th>Priority</th>
          <th>Kota</th>
          <th>Admin By</th>
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
            <!-- <td><?/*= (!empty($data['first_name']))?$data['first_name'].' '.$data['last_name']:"" */ ?></td> -->
            <td><?= (!empty($data['username']))?$data['username']:""?></td>

            <td>
              <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalMoveToTrash<?=$index+1?>" <?=$recall?>>Recall</button>
            </td>
          </tr>
          <div id="modalMoveToTrash<?=$index+1?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Recall Applicant Data Confirmation</h4>
                </div>
                <div class="modal-body">
                  <h5>Are you sure want to Recall this applicant?</h5>
                </div>
                <div class="modal-footer">
                  <a href="<?= Url::to(['bio-trash/trash?id='.$data['id'].'&menu='.$jobType['job_type_id']]) ?>" class="btn btn-danger">Recall</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>
        <?php ;} ?>
      </tbody>
    </table>
  </div>
</div>
