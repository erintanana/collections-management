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
    <h1><?= Html::encode($this->title) ?></h1>

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

    <div class="form-group">
        <?= Html::button('Добавить коллекцию', ['class' => 'btn btn-primary', 'name' => 'add-collection-button']) ?>
        <?= Html::a('Заблокировать', Url::to(['site/collection', 'id' => 1]), ['class' => 'btn btn-danger', 'name' => 'block-user-button']) ?>
    </div>

    <div class="row">
        <?php
        $collections = $model->collections;
        foreach ($collections as $collection) {
            echo "<div class='col-md'>
                        <div class='card'>";
            echo "<h5 class='card-header text-center'>";
            ?>
            <?= Html::a($collection->title, Url::to(['site/collection', 'id' => $collection->id]), ['data-method' => 'POST']); ?>
            <?php
            echo "</h5>" .
                "<div class='card-body'>" .
                "<h6 class='card-title'>Тема: {$collection->topic}</h6>" .
                "<p class='card-text'> $collection->description </p>" .
                "<h6>Автор: <a href='?r=site/profile'>{$collection->user->login}</a></h6>" .
                "</div>";
            echo "<div class='card-footer justify-content-between'>
                        <p class='text-right'>{$collection->created}</p>
                     </div>";
            echo "</div>
                        </div>";
        }
        ?>
    </div>
</div>
