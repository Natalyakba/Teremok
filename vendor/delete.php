<?php
require_once '../config/connect.php';

$id_character = $_GET['id_character'];
print_r($id_character);

mysqli_query($connect, "DELETE FROM characters WHERE `characters`.`id_character` = $id_character");
header("Location: ../admin.php");
exit;
