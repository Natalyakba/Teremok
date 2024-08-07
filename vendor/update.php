<?php
require_once '../config/connect.php';

$id_character = $_POST['id_character'];
$name_character = $_POST['name_character'];
$description_character = $_POST['description_character'];
$image_character = $_POST['image_character'];
$name_shortname = $_POST['name_shortname'];
$name_room = $_POST['name_room'];
$description_room = $_POST['description_room'];
$image_room = $_POST['image_room'];
$text_quote = $_POST['text_quote'];
$title_weather = $_POST['title_weather'];
$description_weather = $_POST['description_weather'];

// echo "id_character: " . $id_character . "<br>";
// echo "name_character: " . $name_character . "<br>";
// echo "description_character: " . $description_character . "<br>";
// echo "image_character: " . $image_character . "<br>";
// echo "name_shortname: " . $name_shortname . "<br>";
// echo "name_room: " . $name_room . "<br>";
// echo "description_room: " . $description_room . "<br>";
// echo "image_room: " . $image_room . "<br>";

mysqli_query($connect, "UPDATE characters SET name_character = '$name_character', image_character = '$image_character', description_character = '$description_character' WHERE id_character = $id_character");
mysqli_query($connect, "UPDATE shortnames 
INNER JOIN characters ON shortnames.id_character = characters.id_character
SET shortnames.name_shortname = '$name_shortname'
WHERE characters.id_character = $id_character;
");
mysqli_query($connect, "UPDATE rooms
INNER JOIN characters ON rooms.id_character = characters.id_character
SET rooms.name_room = '$name_room', rooms.image_room = '$image_room', rooms.description_room = '$description_room'
WHERE characters.id_character = $id_character;
");
mysqli_query($connect, "UPDATE quotes
INNER JOIN characters ON quotes.id_character = characters.id_character
SET quotes.text_quote = '$text_quote'
WHERE characters.id_character = $id_character;
");
mysqli_query($connect, "UPDATE weather AS w
INNER JOIN characters AS c ON w.id_character = c.id_character
SET w.title_weather = '$title_weather', w.description_weather = '$description_weather'
WHERE c.id_character = $id_character;
");

header("Location: ../admin.php");
exit;
