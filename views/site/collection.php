<?php

/* @var $this yii\web\View */

/* @var $model  \app\models\Collection */

use yii\helpers\Html;

$this->title = 'Коллекция';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <?
    if (count($model)) {
        foreach ($model as $item) {
            echo "<p>$item->title</p>";
        }
    } else {
        echo "<div class='alert alert-danger'>Коллекция пустая</div>";
    }

    ?>
</div>
