<?php

/* @var $this yii\web\View */

/* @var $model  \app\models\Collection */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Коллекция';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <?
    if (count($model)) {
        foreach ($model as $item) {
            $tags = $item->tags;
            echo "<div class='list-group'>
        <a href='#' class='list-group-item list-group-item-action'>
            <div class='d-flex w-100 justify-content-between'>
                <h5 class='mb-1'> {$item->title} </h5>
                <small>3 days ago</small>
            </div>
            <div class='d-flex justify-content-start'>";
            foreach ($tags as $tag) {
                echo "<button class='btn btn-outline-success btn-sm'>$tag->title</button>";
            }
            echo "</div>
            <p class='mb-1'>Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small>Donec id elit non mi porta.</small>
        </a>
    </div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Коллекция пустая</div>";
    }
    ?>

</div>
