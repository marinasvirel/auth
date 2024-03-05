<?php
require_once "db.php";

if (!empty($_POST['login']) and !empty($_POST['password'])) {
  $login = $_POST['login'];
  $password = $_POST['password'];
  $date = $_POST['date'];

  $query = "INSERT INTO users SET login='$login', password='$password', date='$date'";
  mysqli_query($link, $query);
}
?>

<form action="" method="POST">
  <input name="login" placeholder="логин">
  <input name="password" type="password" placeholder="пароль">
  <input type="date" name="date">
  <input type="submit">
</form>

<?php
// var_dump($_POST['date']);
?>