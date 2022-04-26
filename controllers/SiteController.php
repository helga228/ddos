<?php

namespace app\controllers;

use app\models\Client;
use app\models\Service;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        $services = Service::getAll(5);
        $clients = Client::getAll();

        return $this->render('index',[
            'services'=>$services['services'],
            'pagination'=>$services['pagination'],
            'clients'=>$clients
        ]);
    }

    public function actionView($id)
    {
        $service = Service::findOne($id);
        $clients = Client::getAll();

        $service->viewedCounter();

        return $this->render('single',[
            'service'=>$service,
            'clients'=>$clients,
        ]);
    }

    public function actionClient($id)
    {

        $data = Client::getServicesByClient($id);
        $clients = Client::getAll();

        return $this->render('category',[
            'services'=>$data['services'],
            'pagination'=>$data['pagination'],
            'clients'=>$clients
        ]);
    }


}