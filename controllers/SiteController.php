<?php

namespace app\controllers;

use app\models\Collection;
use app\models\Item;
use app\models\Person;
use app\models\Tag;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use \app\models\SignupForm;
use app\models\ContactForm;
use \app\models\User;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
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

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionProfile($id = null)
    {
        if (!is_null($id)) {
            $model = User::findOne($id);
            $collectionModel = new Collection();
            if ($collectionModel->load(Yii::$app->request->post()) && $collectionModel->newCollection()) {
                Yii::$app->session->setFlash('success', 'Новая коллекция успешно добавлена.');
                return $this->refresh();
            }
            return $this->render('profile', [
                'model' => $model,
                'collectionModel' => $collectionModel,
            ]);
        } else {
            return $this->render('profile');
        }
    }

    public function actionAdmin()
    {
        return $this->render('admin');
    }

    public function actionCollection($id = null)
    {
        if (!is_null($id)) {
            $collection = Collection::findOne($id);
            return $this->render("collection", ['model' => $collection]);
        }
        return $this->render("collection");
    }

    public function actionSettings($id)
    {
        $model = User::findOne($id);
        $person = Person::findOne($model->person_id);
        if ($model->load(Yii::$app->request->post()) && $person->load(Yii::$app->request->post())) {
            $model->save(false);
            $person->save(false);
            Yii::$app->session->setFlash('success', 'Настройки успешно сохранены.');
            return $this->refresh();
        } else {
            return $this->render('settings', ['model' => $model]);
        }
    }

    public function actionSearch($id)
    {
        $tag = Tag::findOne($id);
        $items = $tag->getitems()->all();
        return $this->render('search', ['model' => $items]);
    }

}
