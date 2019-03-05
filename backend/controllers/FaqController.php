<?php

namespace backend\controllers;

use Yii;
use backend\models\Faq;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * FaqController implements the CRUD actions for Faq model.
 */
class FaqController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'allow'=>[
              'class'=>AccessControl::className(),
              'only'=>['create','update','delete','view','index'],
              'rules'=>[
                [
                  'allow'=>true,
                  'roles'=>['@'],
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

    /**
     * Lists all Faq models.
     * @return mixed
     */
    public function actionIndex()
    {
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
        $dataProvider = new ActiveDataProvider([
            'query' => Faq::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'privilege' =>  $privilege
        ]);
    }

    /**
     * Displays a single Faq model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Faq model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Faq();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by =Yii::$app->user->identity->id;
            if($model->save()){
              return $this->redirect(['view', 'id' => $model->faq_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Faq model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by =Yii::$app->user->identity->id;
            if($model->save()){
              return $this->redirect(['view', 'id' => $model->faq_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Faq model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Faq model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Faq the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Faq::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
