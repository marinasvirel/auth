<?php
session_start();
require_once "db.php";
require_once "functions.php";

$salt = generateSalt();

if (!empty ($_POST['login']) and !empty ($_POST['password'])) {
  $email = $_POST['email'];
  $login = $_POST['login'];
  $password = md5($salt . $_POST['password']);
  $date = $_POST['date'];
  $created = date('Y.m.d');
  $confirm = md5($salt . $_POST['confirm']);

  $query = "SELECT * FROM users WHERE login='$login'";
  $user = mysqli_fetch_assoc(mysqli_query($link, $query));

  if (empty ($user)) {
    if ($password == $confirm) {
      $query = "INSERT INTO users SET email='$email', login='$login', salt='$salt', password='$password', date='$date', created='$created'";
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
  <input type="email" name="email" placeholder="E-mail">
  <input name="login" placeholder="логин">
  <input name="password" type="password" placeholder="пароль">
  <input name="confirm" type="password" placeholder="повторите пароль">
  <input type="date" name="date">
  <input type="submit">
</form>