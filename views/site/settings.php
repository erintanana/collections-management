<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model  \app\models\User */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <h1>
        <?= Html::encode($model->login) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-outline-primary', 'name' => 'save-button']) ?>
    </h1>

    <?php $form = ActiveForm::begin(['id' => 'settings-form']); ?>
    <div class="form-row">
        <div class="col-md-3 m-2">
            <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
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

    <!--    --><? //= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
    //        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
    //    ]) ?>

    <?php ActiveForm::end(); ?>

</div>
