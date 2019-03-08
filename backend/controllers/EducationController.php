<?php

namespace backend\controllers;

use Yii;
use backend\models\Education;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EducationController implements the CRUD actions for Education model.
 */
class EducationController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Education models.
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
            'query' => Education::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'privilege' =>  $privilege
        ]);
    }

    /**
     * Displays a single Education model.
     * @param string $id
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
     * Creates a new Education model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Education();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->edu_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Education model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->edu_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Education model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Education model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Education the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Education::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
