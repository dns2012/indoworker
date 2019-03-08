<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use backend\models\AdminAccess;
use backend\models\AdminPrivilege;

/**
 *
 */
class AdminPrivilegeController extends Controller
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

  function actionIndex($role=0) {
    $listMenu = (new \yii\db\Query())
                ->select(['menu_id'])
                ->from('admin_access')
                ->where(['role_id' => $role])
                ->all();
    $menu = [];
    $privilege = [];
    foreach($listMenu as $listMenu) {
      $menu[] = $listMenu['menu_id'];
      $listPrivilege = (new \yii\db\Query())
                        ->select(['privilege'])
                        ->from('admin_privilege')
                        ->where(['role_id' => $role])
                        ->where(['menu_id' => $listMenu['menu_id']])
                        ->all();
      if(!empty($listPrivilege)) {
        foreach($listPrivilege as $listPrivilege) {
          if(!empty($listPrivilege['privilege'])) {
            $im_privilege = explode(',', $listPrivilege['privilege']);
            $privilege[$listMenu['menu_id']] = $im_privilege;
          }
        }
      }
    }
    $listJobType = (new \yii\db\Query())
                    ->select(['job_type_id','job_description'])
                    ->from('job_type')
                    ->all();
    $jobType = [];
    foreach($listJobType as $listJobType) {
      $jobType[] = $listJobType['job_type_id'].'-'.$listJobType['job_description'];
    }
    $countJobType = count($jobType);
    return $this->render('index', [
      'menu'  =>  $menu,
      'privilege' => $privilege,
      'role'  =>  $role,
      'job_type' =>  $jobType,
      'count_job_type'  =>  $countJobType
    ]);
  }

  function actionAdd($role=0) {
    $request = Yii::$app->request;
    AdminAccess::deleteAll(['role_id' =>  $role]);
    AdminPrivilege::deleteAll(['role_id' =>  $role]);

    // Variable Post
    $menu       = $request->post('menu');
    if(!empty($menu)) {
      $count_menu = count($menu);
      for($u=0;$u<$count_menu;$u++) {
        $modelAccess = new AdminAccess;
        $modelAccess->role_id = $role;
        $modelAccess->menu_id = $menu[$u];
        $modelAccess->save();
      }
    }
    $submenu    = $request->post('submenu');
    if(!empty($submenu)) {
      $count_sub  = count($submenu);
      for($i=0;$i<$count_sub;$i++) {
        $modelAccess = new AdminAccess;
        $modelAccess->role_id = $role;
        $modelAccess->menu_id = $submenu[$i];
        $modelAccess->save();
        $action = $request->post($submenu[$i]);
        if(!empty($action)) {
          $im_action = implode(',',$action);
          $modelPrivilege = new AdminPrivilege;
          $modelPrivilege->role_id    = $role;
          $modelPrivilege->menu_id    = $submenu[$i];
          $modelPrivilege->privilege  = $im_action;
          $modelPrivilege->save();
        }
      }
    }
    return $this->redirect(['/admin-privilege?role='.$role]);
  }
}
