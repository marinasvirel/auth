<?php
session_start();
require_once "db.php";
require_once "header.php";

$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id='$id'";

$res = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($res);

$hash = $user['password'];
if (!empty($_POST['old_password']) && !empty($_POST['new_password'])) {
  $oldPassword = $_POST['old_password'];
  $newPassword = $_POST['new_password'];

  if (password_verify($oldPassword, $hash)) {
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

    $query = "UPDATE users SET password='$newPasswordHash' WHERE id='$id'";
    mysqli_query($link, $query);
  } else {
    echo "пароль введен неверно";
  }
}
?>

<form action="" method="POST">
  <input name="old_password" placeholder="старый пароль">
  <input name="new_password" placeholder="новый пароль">
  <input type="password" name="new_password_confirm" placeholder="подтвердите новый пароль">
  <input type="submit" name="submit">
</form>