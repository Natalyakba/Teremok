<?php

require_once 'config/connect.php';

$character = mysqli_query($connect, "SELECT * FROM `characters`");
$character = mysqli_fetch_all($character); //получаем все мероприятия этого типа, который передан из меню

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
        <p><a href="index.php">Сказка "ТЕРЕМОК"</a></p>
        <div><button id="toggleButton"><i class="fas fa-play"></i></button></div>
    </header>

    <div class="container">
        <div class="content">
            <h1>Персонажи</h1>
            <?php
            foreach ($character as $character) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col_id">id</th>
                            <th class="col_name">Имя</th>
                            <th class="col_img">Рисунок</th>
                            <th colspan="4">Описание</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="8"><?= $character[0] ?></td>
                            <td><?= $character[1] ?></td>
                            <td rowspan="2"><?= $character[2] ?></td>
                            <td rowspan="2" colspan="4" class="td_desc"><?= $character[3] ?></td>
                        </tr>
                        <tr>
                            <?php
                            $shortname = mysqli_query($connect, "SELECT name_shortname FROM shortnames
                            INNER JOIN characters ON shortnames.id_character = characters.id_character
                            WHERE characters.id_character = $character[0];");
                            $shortname = mysqli_fetch_row($shortname);
                            ?>
                            <td><?= $shortname[0] ?></td>
                        </tr>
                        <tr>
                            <th>Комната</th>
                            <?php
                            $room = mysqli_query($connect, "SELECT name_room, image_room, description_room FROM rooms
                            INNER JOIN characters ON rooms.id_character = characters.id_character
                            WHERE characters.id_character = $character[0];");
                            $room = mysqli_fetch_assoc($room);
                            ?>
                            <td colspan="4" class="td_room" name="name_room"><?= $room['name_room'] ?></td>
                            <td colspan="1" name="image_room"><?= $room['image_room'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="6" class="td_room" name="description_room"><?= $room['description_room'] ?></td>
                        </tr>
                        <tr>
                            <th>Погода</th>
                            <?php
                            $weather = mysqli_query($connect, "SELECT title_weather, description_weather FROM weather AS w 
                            INNER JOIN characters AS c ON w.id_character = c.id_character 
                            WHERE c.id_character = $character[0];
                            ");
                            $weather = mysqli_fetch_assoc($weather);
                            ?>
                            <td colspan="5"><?= $weather['title_weather'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="6"> <?= $weather['description_weather'] ?></td>
                        </tr>
                        <tr>
                            <th colspan="6">Цитаты</th>
                        </tr>
                        <tr>
                            <?php
                            $quote = mysqli_query($connect, "SELECT text_quote FROM quotes AS q 
                            INNER JOIN characters AS c ON q.id_character = c.id_character 
                            WHERE c.id_character = $character[0];
                            ");
                            $quote = mysqli_fetch_all($quote);
                            ?>
                            <td colspan="6"><?= $quote[0][0] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="redact.php?id=<?= $character[0] ?>">Редактировать ID <?= $character[0] ?> <i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
            <form action="vendor/create.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col_name">Имя</th>
                            <th>Описание</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="redact" name="name_character" placeholder="имя"></td>
                            <td rowspan="2" class="td_desc"><textarea name="description_character" placeholder="описание персонажа"></textarea></td>
                        </tr>
                        <tr>
                            <td><input class="redact" name="name_shortname" placeholder="вид"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input class="redact" name="image_character" placeholder="изображение персонажа"></td>
                        </tr>
                        <tr>
                            <th>Комната</th>
                            <td><input class="redact" name="name_room" placeholder="название комнаты"></input></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="td_room"><textarea name="description_room" placeholder="описание комнаты"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input class="redact" name="image_room" placeholder="фото комнаты"></td>
                        </tr>
                        <tr>
                            <th>Погода</th>
                            <td><input class="redact" name="title_weather" placeholder="название погоды"></input></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input class="redact" name="description_weather" placeholder="Описание погоды"></td>
                        </tr>
                        <tr>
                            <th colspan="2">Цитаты</th>
                        </tr>
                        <tr>
                            <td colspan="2"><input class="redact" name="text_quote" placeholder="Приветствие теремка"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"><button type="submit">Добавить нового персонажа<i class="fa fa-pencil" aria-hidden="true"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <div class="up"><button><a href="vendor/default.php">Редактировать по умолчанию</a></button></div>
        </div>
    </div>
</body>

</html>