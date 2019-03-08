<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\JobPostActivity;
use backend\models\JobType;
use yii\filters\AccessControl;

/**
 *
 */
class BioRejectedController extends Controller
{

  public function behaviors()
  {
      return [
          'allow' => [
            'class'=> AccessControl::className(),
            'only' => ['index'],
            'rules' => [
                [
                'allow' => true,
                'roles' => ['@'],
                ],
              ],
          ],
      ];
  }


  function actionIndex($id=0) {
    $model = new JobPostActivity;
    // Get Data Job Post Activity
    $dataJobPostActivity =  (new \yii\db\Query())
                            ->select(['job_post_activity.apply_date', 'applicant.name',
                            'applicant.phone', 'job_post_activity.job_priority', 'applicant.address',
                            'job_post_activity.id', 'user_admin.first_name', 'user_admin.last_name', 'user_admin.username'])
                            ->from('job_post_activity')
                            ->join('INNER JOIN', 'applicant', 'applicant.user_account_id = job_post_activity.user_account_id')
                            ->join('INNER JOIN', 'job_post', 'job_post.job_post_id = job_post_activity.job_post_id')
                            ->join('LEFT JOIN', 'user_admin', 'user_admin.id = job_post_activity.admin_by')
                            ->where(['job_post.job_type_id'  =>  $id])
                            ->andWhere(['job_post_activity.step' => 1])
                            ->andWhere(['job_post_activity.reject' => 1])
                            ->all();
    $dataJobType         =  (new \yii\db\Query())
                            ->select(['job_description', 'job_type_id'])
                            ->from('job_type')
                            ->where(['job_type_id' =>  $id])
                            ->one();
    /* $otherJobType        =  (new \yii\db\Query())
                            ->select(['job_description', 'job_type_id'])
                            ->from('job_type')
                            ->where(['!=', 'job_type_id', $id])
                            ->all();
     */

    // $countOJT = count($otherJobType);
    $controller = Yii::$app->controller->id;
    if(!empty(Yii::$app->controller->actionParams['id'])) {
      $param_id = Yii::$app->controller->actionParams['id'];
      $request_now = $controller."?id=".$param_id;
      $listPrivilege = (new \yii\db\Query())
                        ->select(['*'])
                        ->from('admin_privilege')
                        ->where(['role_id' => Yii::$app->user->identity->role])
                        ->andWhere(['menu_id' => $request_now])
                        ->one();
    } else {
      $listPrivilege = (new \yii\db\Query())
                        ->select(['*'])
                        ->from('admin_privilege')
                        ->where(['role_id'  =>  Yii::$app->user->identity->role])
                        ->andWhere(['menu_id' => $controller])
                        ->one();
    }
    $privilege = explode(',', $listPrivilege['privilege']);
    return $this->render('index', [
      "model" =>  $model,
      "dataJobPostActivity" =>  $dataJobPostActivity,
      "jobType" =>  $dataJobType,
      "privilege" =>  $privilege
      // "otherJobType"  =>  $otherJobType,
      // "countOJT"  =>  $countOJT
    ]);
  }

  function actionRejected($id=0,$menu=0) {
    $model = JobPostActivity::findOne($id);
    // $model->status_read = 1;
    // $model->step = 1;
    $model->recall = 1;
    $model->admin_by = Yii::$app->user->identity->id;
    $model->save();
    return $this->redirect(['/bio-rejected?id='.$menu]);
  }

}
