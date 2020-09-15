<?php

/* @var $this yii\web\View */

/* @var $model  Collection */

use app\models\Collection;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

$this->title = 'Коллекция';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <?php if ($model->owner_id == Yii::$app->user->id): ?>
        <?= Html::button('Добавить айтем', ['class' => 'btn btn-primary ',
            'name' => 'add-item-button',
            'data-toggle' => 'modal',
            'data-target' => '#add-item-modal']) ?>
    <?php endif; ?>
    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => Collection::findOne($model->id)->getitems(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]),
        'columns' => [
            'title',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
