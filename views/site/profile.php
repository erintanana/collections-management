<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model  User */

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <h1>
        <?= Html::encode($model->login) ?>

        <?php if ($model->id == Yii::$app->user->id): ?>
            <?= Html::a('Настройки', Url::to(
                ['site/settings', 'id' => $model->id]),
                ['data-method' => 'POST', 'class' => 'btn btn-outline-primary']); ?>
        <?php endif; ?>

        <?= Html::a('Заблокировать', Url::to(
            ['site/collection', 'id' => 1]),
            ['class' => 'btn btn-danger', 'name' => 'block-user-button']) ?>
    </h1>

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
                "</div>";
            echo "<div class='card-footer justify-content-between'>
                        <p class='text-right'>{$collection->created}</p>
                     </div>";
            echo "</div>
                        </div>";
        }
        ?>
    </div>

    <div class="form-row justify-content-start mt-5">
        <div class="col-md-3">
            <?php if ($model->id == Yii::$app->user->id): ?>
                <?= Html::button('Добавить коллекцию', ['class' => 'btn btn-primary ',
                    'name' => 'add-collection-button',
                    'data-toggle' => 'modal',
                    'data-target' => '#add-collection-modal']) ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade" id="add-collection-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="add-collection-modal-label"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-collection-modal-label">Новая коллекция</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Добавить</button>
                </div>
            </div>
        </div>
    </div>

</div>
