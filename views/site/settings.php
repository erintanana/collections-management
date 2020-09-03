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
<div class="site-contact">
    <h1>
        <?= Html::encode($model->login) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-outline-primary', 'name' => 'save-button']) ?>
    </h1>

    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

    <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'nickname') ?>

    <?= $form->field($model->person, 'name') ?>

    <?= $form->field($model->person, 'surname') ?>

    <?= $form->field($model->person, 'date_of_birth') ?>

    <?= $form->field($model, 'site_theme') ?>

    <?= $form->field($model, 'site_language') ?>

    <!--    --><? //= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
    <!---->
    <!--    --><? //= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
    //        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
    //    ]) ?>

    <?php ActiveForm::end(); ?>

</div>
