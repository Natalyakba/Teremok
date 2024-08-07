<?php

require_once 'config/connect.php';

$paragraph = mysqli_query($connect, "SELECT id_paragraph FROM `paragraphs`");
$paragraph = mysqli_fetch_all($paragraph);
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

            <h1>По главам</h1>
            <?php

            foreach ($paragraph as $paragraph) {
            ?>
                <!-- <?php print_r($paragraph[0]); ?> -->
                <table class="table">
                    <thead>
                        <?php
                        $character = mysqli_query($connect, "SELECT c.id_character, c.name_character, c.image_character, c.description_character
                            FROM characters as c
                            INNER JOIN paragraphs as p ON c.id_paragraph = p.id_paragraph
                            WHERE p.id_paragraph = $paragraph[0];
                            ");
                        $character = mysqli_fetch_assoc($character);

                        $id_character = $character['id_character'];

                        $shortname = mysqli_query($connect, "SELECT name_shortname FROM shortnames as s
                            INNER JOIN characters as c 
                            ON s.id_character = c.id_character
                            WHERE c.id_character = $id_character;");
                        $shortname = mysqli_fetch_row($shortname);
                        ?>
                        <tr>
                            <th rowspan="1" class="col_id">№</th>
                            <th colspan="2">Кто пришел в этой главе</th>
                            <th colspan="3"><?= $character['name_character'] ?> или просто <?= $shortname[0] ?></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td rowspan="8"><?= $paragraph[0] ?></td>
                            <td><?= $character['image_character'] ?></td>
                            <td colspan="4" class="td_desc"><?= $character['description_character'] ?></td>
                        </tr>
                        <?php
                        $weather = mysqli_query($connect, "SELECT title_weather, description_weather FROM weather AS w 
                            INNER JOIN paragraphs AS p ON w.id_paragraph = p.id_paragraph
                            WHERE p.id_paragraph = $paragraph[0];");
                        $weather = mysqli_fetch_assoc($weather);
                        ?>
                        <tr>
                            <th colspan="2">Какая была погода</th>
                            <td colspan="3"><?= $weather['title_weather'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="5"> <?= $weather['description_weather'] ?></td>
                        </tr>
                        <tr>
                            <th colspan="5">Какую комнату в теремке занимает <?= $shortname[0] ?></th>
                        </tr>
                        <?php
                        $room = mysqli_query($connect, "SELECT name_room, image_room, description_room FROM rooms AS r 
                            INNER JOIN paragraphs AS p ON r.id_paragraph = p.id_paragraph
                            WHERE p.id_paragraph = $paragraph[0];");
                        $room = mysqli_fetch_assoc($room);
                        ?>
                        <tr>
                            <td colspan="3" class="td_room" name="name_room"><?= $room['name_room'] ?></td>
                            <td colspan="2" rowspan="2" name="image_room"><?= $room['image_room'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="td_room" name="description_room"><?= $room['description_room'] ?></td>
                        </tr>
                        <tr>
                            <th colspan="5">Цитаты</th>
                        </tr>
                        <?php
                        $quote = mysqli_query($connect, "SELECT text_quote FROM quotes AS q 
                            INNER JOIN paragraphs AS p ON q.id_paragraph = p.id_paragraph
                            WHERE p.id_paragraph = $paragraph[0];;
                            ");
                        $quote = mysqli_fetch_all($quote);
                        ?>
                        <tr>

                            <td colspan="5"><?= $quote[0][0] ?></td>
                        </tr>

                    </tbody>
                </table>
            <?php

            }
            ?>
            <div class="up"><button><a href="vendor/default.php">Редактировать по умолчанию</a></button></div>
        </div>
    </div>
</body>

</html>