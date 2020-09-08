<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use \app\models\Collection;
use \app\models\Tag;

$this->title = 'Collections Management';
?>

<div class="row">
    <div class="col-md">
        <h3>Недавние</h3>
    </div>
</div>

<div class="row">
    <?php
    $collections = Collection::find()
        ->with('user')
        ->limit(3)
        ->orderBy('created desc')
        ->all();
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
            "<h6>Автор:";
        ?>
        <?= Html::a($collection->user->login, Url::to(['site/profile', 'id' => $collection->user->id]), ['data-method' => 'POST']); ?>
        <?php
        echo "</h6>" .
            "</div>";
        echo "<div class='card-footer justify-content-between'>
                        <p class='text-right'>{$collection->created}</p>
                     </div>";
        echo "</div>
                        </div>";
    }
    ?>
</div>

<div class="row">
    <div class="col-md">
        <h3>Популярные теги</h3>
    </div>
</div>

<div class="row">
    <?php
    $tags = Tag::find()->all();
    echo "<div class='col-md'>";
    foreach ($tags as $tag) {
        echo "<div class='d-inline-block mr-3'><button class='btn btn-outline-success btn-sm'>$tag->title</button></div>";
    }
    echo "</div>"
    ?>
</div>

