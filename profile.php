<?php
require_once "db.php";
require_once "functions.php";

$id = $_GET['id'];

$query = "SELECT * FROM users WHERE `id`= '$id'";
$res = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($res);

echo $user['name'] . "<br>";
echo $user['surname'] . "<br>";
echo $user['patronymic'] . "<br>";
echo $user['login'] . "<br>";
echo calculate_age($user['date']);


