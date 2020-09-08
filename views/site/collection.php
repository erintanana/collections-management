<?php

/* @var $this yii\web\View */

/* @var $model  Collection */

use app\models\Collection;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'Коллекция';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <?php
    if (count($model)) {
        foreach ($model as $item) {
            $tags = $item->tags;
            echo "<div class='list-group'>
                    <div class='list-group-item list-group-item-action'>
                        <div class='d-flex w-100 justify-content-between'>
                            <h5 class='mb-1'> {$item->title} </h5>
                            <small>3 days ago</small>
                        </div>
                    <div class='d-flex justify-content-start'>";
            foreach ($tags as $tag) {
                echo "<div class='d-inline-block mr-3'>";
                ?>
                <?= Html::a($tag->title, Url::to(['site/search', 'id' => $tag->id]), ['data-method' => 'POST', 'class' => 'btn btn-outline-success btn-sm']); ?>
                <?php
                echo "</div>";
            }
            echo "</div>
                    <p class='mb-1'>Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                    <small>Donec id elit non mi porta.</small>
                    </div>
                </div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Коллекция пустая</div>";
    }
    ?>

</div>
