<?php
require_once '../config/connect.php';

$name_character = $_POST['name_character'];
$description_character = $_POST['description_character'];
$name_shortname = $_POST['name_shortname'];
$image_character = $_POST['image_character'];
$name_room = $_POST['name_room'];
$description_room = $_POST['description_room'];
$image_room = $_POST['image_room'];
$text_quote = $_POST['text_quote'];
$title_weather = $_POST['title_weather'];
$description_weather = $_POST['description_weather'];

mysqli_query($connect, "INSERT INTO `characters` (`id_character`, `name_character`, `image_character`, `description_character`) VALUES (NULL, '$name_character', '$image_character', '$description_character')");
$id_character = mysqli_insert_id($connect);

mysqli_query($connect, "INSERT INTO `shortnames` (`id_shortname`, `id_character`, `name_shortname`) VALUES (NULL, '$id_character', '$name_shortname')");
mysqli_query($connect, "INSERT INTO `rooms` (`id_room`, `name_room`, `image_room`, `description_room`, `id_character`) VALUES (NULL, '$name_room', '$image_room', '$description_room', '$id_character')");
mysqli_query($connect, "INSERT INTO `quotes` (`id_quote`, `id_character`, `text_quote`) VALUES (NULL, '$id_character', '$text_quote')");
mysqli_query($connect, "INSERT INTO `weather` (`id_weather`, `title_weather`, `description_weather`, `id_character`) VALUES (NULL, '$title_weather', '$description_weather', '$id_character')");

header("Location: ../admin.php");
exit;
