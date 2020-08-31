<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\Tabs;
use \app\models\Collection;
use \app\models\User;

$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php

    $users = User::find()->with('person')->all();
    echo "<table class='table table-striped'>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Nickname</th>
                <th>Login</th>
                <th>Created</th>
                <th>Name</th>
                <th>Surname</th>
                <th>DOB</th>
            </tr>";
    foreach ($users as $user) {
        $person = $user->person;
        echo "<tr>";
        echo "<td> $user->id </td>" .
            "<td> $user->email </td>" .
            "<td> $user->nickname </td>" .
            "<td> $user->login </td>" .
            "<td> $user->created </td>" .
            "<td> $person->name </td>" .
            "<td> $person->surname </td>" .
            "<td> $person->date_of_birth </td>";
        echo "</tr>";
    }
    echo "</table>";
    echo Tabs::widget([
        'items' => [
            [
                'label' => 'Заголовок вкладки 1',
                'content' => 'Вкладка 1',
                'active' => true // указывает на активность вкладки
            ],
            [
                'label' => 'Заголовок вкладки 3',
                'content' => 'Вкладка 3',
                'headerOptions' => [
                    'id' => 'someId'
                ]
            ],
            [
                'label' => 'Пользователи',
                'url' => ['/site/profile'],
            ],
            [
                'label' => 'Dropdown',
                'items' => [
                    [
                        'label' => '1',
                        'content' => 'Выпадашка 1'
                    ],
                    [
                        'label' => '2',
                        'content' => 'Выпадашка 2'
                    ],
                    [
                        'label' => '3',
                        'content' => 'Выпадашка 3'
                    ],
                ]
            ]
        ]
    ]);
    ?>
</div>
