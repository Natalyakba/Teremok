<?php

require_once 'config/connect.php';

$id_character = $_GET['id'];

$character = mysqli_query($connect, "SELECT * FROM `characters` WHERE `id_character` = $id_character;");
$character = mysqli_fetch_assoc($character); //получаем все мероприятия этого типа, который передан из меню

$shortname = mysqli_query($connect, "SELECT name_shortname FROM `shortnames` WHERE `id_character` = $id_character;");
$shortname = mysqli_fetch_all($shortname);
$shortname = ($shortname[0]);

$room = mysqli_query($connect, "SELECT * FROM `rooms` WHERE `id_character` = $id_character;");
$room = mysqli_fetch_assoc($room);

$quote = mysqli_query($connect, "SELECT text_quote FROM `quotes` WHERE `id_character` = $id_character;");
$quote = mysqli_fetch_assoc($quote);

$weather = mysqli_query($connect, "SELECT title_weather, description_weather FROM `weather` WHERE `id_character` = $id_character;");
$weather = mysqli_fetch_assoc($weather);
// $room = ($room[0]);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сказка "Теремок"</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <header class="header">
        <p><a href="index.php">Сказка
                "ТЕРЕМОК"</a></p>
        <div>
            <button id="toggleButton"><i class="fas fa-play"></i></button>
        </div>
    </header>

    <div class="container">
        <div class="content">
            <form action="vendor/update.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col_id">id</th>
                            <th class="col_name">Имя</th>
                            <th class="col_img">Рисунок</th>
                            <th colspan="2">Описание</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="10"><?= $character['id_character'] ?></td>
                            <input type="hidden" name="id_character" value="<?= $character['id_character'] ?>">
                            <td><textarea name="name_character"><?= $character['name_character'] ?></textarea></td>
                            <td rowspan="2"><?= $character['image_character'] ?></td>
                            <td rowspan="2" colspan="2" class="td_desc"><textarea name="description_character"><?= $character['description_character'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td><textarea name="name_shortname"><?= $shortname[0] ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4"><textarea name="image_character"><?= $character['image_character'] ?></textarea></td>
                        </tr>
                        <tr>
                            <th>Комната</th>
                            <td colspan="3"><textarea name="name_room"><?= $room['name_room'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4"><textarea name="description_room"><?= $room['description_room'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4"><textarea name="image_room"><?= $room['image_room'] ?></textarea></td>
                        </tr>
                        <tr>
                            <th>Погода</th>
                            <td colspan="3"><textarea name="title_weather"><?= $weather['title_weather'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4"><textarea name="description_weather"><?= $weather['description_weather'] ?></textarea></td>
                        </tr>
                        <tr>
                            <th colspan="4">Цитаты</th>
                        </tr>
                        <tr>
                            <td colspan="4"><textarea name="text_quote"><?= $quote['text_quote'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center;"><button type="submit">Редактировать ID <?= $character['id_character'] ?><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
                            <td colspan="2" style="text-align: center;"><button><a href="vendor/delete.php?id_character=<?= $character['id_character'] ?>">Удалить ID <?= $character['id_character'] ?><i class="fa fa-pencil" aria-hidden="true"></i></a></button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <!-- <?php
                    print_r($character);
                    ?> -->

        </div>
    </div>
</body>

</html>