<?php

/* @var $this yii\web\View */

/* @var $model app\models\Item */

use yii\helpers\Html;
use yii\helpers\Url;

use app\models\Item;

$this->title = 'Результаты поиска';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md">
        <h3>Результаты поиска</h3>
    </div>
</div>
<?php
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
        ?>
        <?= Html::a($tag->title, Url::to(['site/search', 'id' => $tag->id]), ['data-method' => 'POST', 'class' => 'btn btn-outline-success btn-sm']); ?>
        <?php
    }
    echo "</div></div></div>";
}
?>



