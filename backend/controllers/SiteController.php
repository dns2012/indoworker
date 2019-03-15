<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'=>['login', 'logout','signup'], //edited by AHZ
                'rules' => [
                    [
                        //'actions' => ['login', 'error'],
                        'actions' => ['index','login','signup'],
                        'allow' => true,
                        //'roles'=>['?']
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (isset(Yii::$app->user->identity->id))
        {
          return $this->redirect(['home']);
        }else {
          return $this->redirect(['login']);
        }
    }

    public function actionHome() {
      if (isset(Yii::$app->user->identity->id))
      {
        return $this->render('index');
      }else {
        return $this->redirect(['login']);
      }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
             return $this->goBack();
        } else {
            $model->password = '';
            return $this->render('login', [
                'model' => $model, ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        //return $this->goHome();
        return $this->redirect(\Yii::$app->urlManager->createUrl("site/login"));
    }



}
