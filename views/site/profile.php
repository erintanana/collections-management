<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \app\models\Collection;
use \app\models\User;

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    $user = User::findOne(1);
    $person = $user->person;
    echo "<h5>$user->login</h5>";
    echo "<h5>$user->nickname</h5>";
    echo "<h5>$user->email</h5>";
    echo "<h5>$user->site_language</h5>";
    echo "<h5>$user->site_theme</h5>";
    echo "<h5>$person->name</h5>";
    echo "<h5>$person->surname</h5>";
    echo "<h5>$person->date_of_birth</h5>";
    ?>
</div>
