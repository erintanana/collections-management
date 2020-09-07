<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model  User */

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <?php $form = ActiveForm::begin(['id' => 'settings-form']); ?>

    <h1>
        <?= Html::encode($model->login) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-outline-primary', 'name' => 'save-button']) ?>
    </h1>

    <div class="form-row">
        <div class="col-md-3 m-2">
            <?= $form->field($model, 'login')->textInput() ?>
        </div>
        <div class="col-md-3 m-2">
            <?= $form->field($model, 'email') ?>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-3 m-2">
            <?= $form->field($model->person, 'name') ?>
        </div>
        <div class="col-md-3 m-2">
            <?= $form->field($model->person, 'surname') ?>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-3 m-2">
            <?= $form->field($model, 'nickname') ?>
        </div>
        <div class="col-md-3 m-2">
            <?= $form->field($model->person, 'date_of_birth') ?>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-3 m-2">
            <?= $form->field($model, 'site_theme')->dropDownList([
                '0' => 'Темная',
                '1' => 'Светлая',
            ]) ?>
        </div>
        <div class="col-md-3 m-2">
            <?= $form->field($model, 'site_language')->dropDownList([
                '0' => 'Русский',
                '1' => 'English',
            ]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
