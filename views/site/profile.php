<?php

/* @var $this yii\web\View */

/* @var $model  \app\models\User */

use yii\helpers\Html;

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <h5><?= $model->login ?></h5>
    <h5><?= $model->nickname ?></h5>
    <h5><?= $model->email ?></h5>
    <h5><?= $model->site_language ?></h5>
    <h5><?= $model->site_theme ?></h5>
    <h5><?= $model->person->name ?></h5>
    <h5><?= $model->person->surname ?></h5>
    <h5><?= $model->person->date_of_birth ?></h5>
</div>
