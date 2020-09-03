<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Tabs;
use \app\models\Collection;
use \app\models\User;

$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <?php
    $users = User::find()->with('person')->all();
    echo "<table class='table table-striped'>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Email</th>
                <th>Nickname</th>
                <th>Created</th>
                <th>Name</th>
                <th>Surname</th>
                <th>DOB</th>
                <th></th>
            </tr>";
    foreach ($users as $user) {
        $person = $user->person;
        echo "<tr class='align-items-center'>";
        echo "<td> $user->id </td>" .
            "<td>";
        ?>
        <?= Html::a($user->login, Url::to(['site/profile', 'id' => $user->id]), ['data-method' => 'POST']); ?>
        <?php
        echo "</td>" .
            "<td> $user->email </td>" .
            "<td> $user->nickname </td>" .
            "<td> $user->created </td>" .
            "<td> $person->name </td>" .
            "<td> $person->surname </td>" .
            "<td> $person->date_of_birth </td>" .
            "<td>";
        ?>
        <?= Html::a("Удалить", Url::to(['admin/delete', 'id' => $user->id]),
            ['data-method' => 'POST',
                'class' => 'btn btn-sm btn-danger',
                'name' => 'block-user-button']); ?>
        <?php
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</div>
