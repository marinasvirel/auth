<?php
session_start();

require_once "db.php";

if (!empty($_POST['login']) && !empty($_POST['password'])) {
  $login = $_POST['login'];

  $query = "SELECT * FROM users WHERE `login`='$login'";
  $res = mysqli_query($link, $query);
  $user = mysqli_fetch_assoc($res);

  if (!empty($user)) {
    $hash = $user['password'];
    if (password_verify($_POST['password'], $hash)) {
      $_SESSION['auth'] = true;
      $_SESSION['id'] = $user['id'];
      $_SESSION['login'] = $user['login'];
      $_SESSION['status'] = $user['status'];
      echo "авторизация прошла успешно";
    } else {
      echo "пароль не подходит";
    }
  } else {
    echo "пользователя с таким логином нет";
  }
}
?>

<form action="" method="POST">
  <input name="login" placeholder="логин">
  <input name="password" type="password" placeholder="пароль">
  <input type="submit">
</form>