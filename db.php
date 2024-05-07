<?php
// Подключение к базе
$host = 'localhost'; // имя хоста
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'mydb';      // имя базы данных

$link = mysqli_connect($host, $user, $pass, $name);

// Таблица users
$query = "SELECT * FROM users";
$res = mysqli_query($link, $query);

for ($users = []; $row = mysqli_fetch_assoc($res); $users[] = $row);