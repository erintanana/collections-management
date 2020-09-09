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
use yii\filters\VerbFilter;
use app\models\LoginForm;
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

    public function actionProfile($id = null)
    {
        if (!is_null($id)) {
            $model = User::findOne($id);
            return $this->render('profile', [
                'model' => $model,
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
            $items = $collection->getitems()->all();
            return $this->render("collection", ['model' => $items]);
        }
        return $this->render("collection");
    }

    public function actionSettings($id)
    {
        $model = User::findOne($id);
        $person = Person::findOne($model->getId());
        if ($model->load(Yii::$app->request->post()) && $person->load(Yii::$app->request->post())) {
            $model->save(false);
            $person->save(false);
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

    public function actionBlock($id){
        $user = User::findOne($id);
        $user->is_blocked = !$user->is_blocked;
        $user->save();
        return $this->render('profile', [
            'model' => $user,
        ]);
    }
}
