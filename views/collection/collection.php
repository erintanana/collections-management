<?php

/* @var $this yii\web\View */
/* @var $model  \app\models\Collection */

use yii\helpers\Html;

$this->title = 'Коллекция';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <?
    foreach ($model as $item) {
        echo $item->title;
    }
    ?>
</div>
