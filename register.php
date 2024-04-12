<?php
session_start();
require_once "db.php";

if (!empty ($_POST['login']) and !empty ($_POST['password'])) {
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $patronymic = $_POST['patronymic'];
  $email = $_POST['email'];
  $login = $_POST['login'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $confirm = $_POST['confirm'];
  $date = $_POST['date'];
  $created = date('Y.m.d');

  $query = "SELECT * FROM users WHERE login='$login'";
  $user = mysqli_fetch_assoc(mysqli_query($link, $query));

  if (empty ($user)) {
    if ($_POST['password'] == $confirm) {
      $query = "INSERT INTO users SET name='$name', surname='$surname', patronymic='$patronymic',email='$email', login='$login', password='$password', date='$date', created='$created'";
      mysqli_query($link, $query);
      $_SESSION['auth'] = true;
      $_SESSION['login'] = $login;

      $id = mysqli_insert_id($link);
      $_SESSION['id'] = $id;
    } else {
      echo "пароли не совпадают";
    }
  } else {
    echo "логин занят";
  }
} else {
  echo "заполните логин и пароль";
}
?>

<form action="" method="POST">
  <input type="text" name="name" placeholder="имя">
  <input type="text" name="surname" placeholder="фамилия">
  <input type="text" name="patronymic" placeholder="отчество">
  <input type="email" name="email" placeholder="E-mail">
  <input name="login" placeholder="логин">
  <input name="password" type="password" placeholder="пароль">
  <input name="confirm" type="password" placeholder="повторите пароль">
  <input type="date" name="date">
  <input type="submit">
</form>