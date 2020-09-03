<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use \app\models\User;

class AdminController extends Controller
{

    public function actionDelete($id)
    {
        if (!is_null($id)) {
            $user = User::findOne($id);
            $person = $user->person;
            $user->delete();
            $person->delete();
            return $this->goHome();
        }
    }

}
