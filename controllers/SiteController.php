<?php

namespace app\controllers;

use app\models\City;
use app\models\Comments;
use app\models\MyForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Context\Person;

class SiteController extends Controller
{
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionHello()
    {
        $form = new MyForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $name = Html::encode($form->name);
            $email = Html::encode($form->email);
            $form->email;
            return $this->render('success', ['name' => $name, 'email' => $email]);

        }

        return $this->render('hello', ['form' => $form]);
    }

    public function actionFamily()
    {
        $family = Person::find()->all();
        return $this->render('family', ['family' => $family]);
    }

    public function actionCreate()
    {
        $model = new MyForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $name = Html::encode($model->name);
            $email = Html::encode($model->email);
            $phone = Html::encode($model->phone);
            $promo = Html::encode($model->promo);
            $status = Html::encode($model->status);
            $inn = Html::encode($model->inn);
            return $this->render('MyFormSucess', ['model' => $model, 'name' => $name, 'email' => $email, 'phone' => $phone, 'promo' => $promo, 'status' => $status, 'inn' => $inn]);
        }

        return $this->render('myform', ['model' => $model]);
    }

    public function actionComments()
    {
        $comments = Comments::find()->all();
        return $this->render('myformdb', ['comments' => $comments]);
    }

    public function actionRegistration()
    {
        $user = new User();
        $cities = City::find()->all();
        if ($user->load(Yii::$app->request->post()) && $user->validate()) {
            if($user->save())
            return $this->render('MyFormSucess');
        }

        return $this->render('register', ['user' => $user, 'cities' => $cities]);
    }


}
