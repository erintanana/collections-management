<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="align-items-end">
        <?php
        NavBar::begin([
            'brandLabel' => "Коллекции",
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-light bg-light',
            ],
        ]);
        ?>
        <div class="row justify-content-between ml-auto">
            <?php
            echo '<form class="form-inline my-2 my-lg-0">
                    <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
                    <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit">&succ;</button>
                </form>';
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    Yii::$app->user->isGuest ?
                        (
                            '' . Html::a("Войти", Url::to(['/site/login']),
                                ['class' => 'nav-link',]) .
                            '' . Html::a("Регистрация", Url::to(['/site/signup']),
                                ['class' => 'nav-link',])
                        ) :
                        (
                            '' . Html::a("Профиль", Url::to(['site/profile', 'id' => Yii::$app->user->id]),
                                ['data-method' => 'POST',
                                    'class' => 'nav-link',]) .
                            '' . Html::a("Панель администратора", Url::to(['/site/admin']),
                                ['class' => 'nav-link',]) .
                            '' . Html::a("Выйти", Url::to(['site/logout']),
                                ['data-method' => 'POST',
                                    'class' => 'nav-link',])
                        )
                ],
            ]);

            ?>
        </div>
        <?php
        NavBar::end();
        ?>

    </div>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>


</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
