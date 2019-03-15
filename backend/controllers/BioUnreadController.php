<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\JobPostActivity;
use backend\models\JobType;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 *
 */
class BioUnreadController extends Controller
{

  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
      return [
          'allow' =>[
            'class'=>AccessControl::className(),
            'only'=>['create','update','delete','view','index'],
            'rules'=>[
                  [
                    'allow'=>true,
                    'roles'=>['@']
                  ],
              ],
            ],

          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'delete' => ['POST'],
              ],
          ],
      ];

  }

  function actionIndex($id=0) {
    if(!empty(Yii::$app->controller->actionParams['id'])) {
      $controller = Yii::$app->controller->id;
      $param_id = Yii::$app->controller->actionParams['id'];
      $request_now = $controller."?id=".$param_id;
      $listPrivilege = (new \yii\db\Query())
                        ->select(['*'])
                        ->from('admin_privilege')
                        ->where(['role_id' => Yii::$app->user->identity->role])
                        ->andWhere(['menu_id' => $request_now])
                        ->one();
      $access = (new \yii\db\Query())
                ->select(['*'])
                ->from('admin_access')
                ->where(['role_id' => Yii::$app->user->identity->role])
                ->andWhere(['menu_id' => $request_now])
                ->one();
      $country = $access['country'];
    }
    $privilege = explode(',', $listPrivilege['privilege']);
    // Get Data Job Post Activity
    $model = new JobPostActivity;
    if(!empty($country)) {
      if($country != 'ALL') {
        $dataJobPostActivity =  (new \yii\db\Query())
                                ->select(['job_post_activity.apply_date', 'applicant.name',
                                'applicant.phone', 'job_post_activity.job_priority', 'applicant.address',
                                'job_post_activity.id'])
                                ->from('job_post_activity')
                                ->join('INNER JOIN', 'applicant', 'applicant.user_account_id = job_post_activity.user_account_id')
                                ->join('INNER JOIN', 'job_post', 'job_post.job_post_id = job_post_activity.job_post_id')
                                ->join('INNER JOIN', 'job_location', 'job_location.job_location_id = job_post.job_location_id')
                                ->where(['job_post.job_type_id'  =>  $id])
                                ->andWhere(['job_post_activity.step' => 0])
                                ->andWhere(['job_location.country_id' => $country])
                                ->all();
      } else {
        $dataJobPostActivity =  (new \yii\db\Query())
                                ->select(['job_post_activity.apply_date', 'applicant.name',
                                'applicant.phone', 'job_post_activity.job_priority', 'applicant.address',
                                'job_post_activity.id'])
                                ->from('job_post_activity')
                                ->join('INNER JOIN', 'applicant', 'applicant.user_account_id = job_post_activity.user_account_id')
                                ->join('INNER JOIN', 'job_post', 'job_post.job_post_id = job_post_activity.job_post_id')
                                ->where(['job_post.job_type_id'  =>  $id])
                                ->andWhere(['job_post_activity.step' => 0])
                                ->all();
      }
    } else {
      $dataJobPostActivity =  (new \yii\db\Query())
                              ->select(['job_post_activity.apply_date', 'applicant.name',
                              'applicant.phone', 'job_post_activity.job_priority', 'applicant.address',
                              'job_post_activity.id'])
                              ->from('job_post_activity')
                              ->join('INNER JOIN', 'applicant', 'applicant.user_account_id = job_post_activity.user_account_id')
                              ->join('INNER JOIN', 'job_post', 'job_post.job_post_id = job_post_activity.job_post_id')
                              ->where(['job_post.job_type_id'  =>  $id])
                              ->andWhere(['job_post_activity.step' => 0])
                              ->all();
    }

    $dataJobType         =  (new \yii\db\Query())
                            ->select(['job_description', 'job_type_id'])
                            ->from('job_type')
                            ->where(['job_type_id' =>  $id])
                            ->one();
    $otherJobType        =  (new \yii\db\Query())
                            ->select(['job_description', 'job_type_id'])
                            ->from('job_type')
                            ->where(['!=', 'job_type_id', $id])
                            ->all();
    $countOJT = count($otherJobType);
    return $this->render('index', [
      "model" =>  $model,
      "dataJobPostActivity" =>  $dataJobPostActivity,
      "jobType" =>  $dataJobType,
      "otherJobType"  =>  $otherJobType,
      "countOJT"  =>  $countOJT,
      'privilege' =>  $privilege
    ]);
  }

  function actionReject($id=0,$menu=0) {
    $model = JobPostActivity::findOne($id);
    $model->status_read = 1;
    $model->step = 1;
    $model->reject = 1;
    $model->admin_by = Yii::$app->user->identity->id;
    $model->save();
    return $this->redirect(['/bio-unread?id='.$menu]);
  }

  function actionAccept($id=0,$menu=0) {
    $model = JobPostActivity::findOne($id);
    $model->status_read = 1;
    $model->step = 2;
    $model->accept = 1;
    $model->admin_by = Yii::$app->user->identity->id;
    $model->save();
    return $this->redirect(['/bio-unread?id='.$menu]);
  }

  function actionAcceptojt($id=0, $menu=0) {
    $request = Yii::$app->request;
    $model = JobPostActivity::findOne($id);
    $model->status_read = 1;
    $model->step = 2;
    $model->move_job_type_id = $request->post('job');
    $model->accept = 1;
    $model->admin_by = Yii::$app->user->identity->id;
    $model->save();
    return $this->redirect(['/bio-unread?id='.$menu]);
  }
}
