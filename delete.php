<?php

session_start();
require_once "db.php";

$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id='$id'";

$res = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($res);

$hash = $user['password'];

?>

<form action="" method="post">
  <input type="password" name="password" placeholder="пароль">
  <input type="submit">
</form>

<?php
if ($_POST) {
  if (password_verify($_POST['password'], $hash)) {
    $query = "DELETE FROM users WHERE id='$id'";
    mysqli_query($link, $query);
  } else {
    echo "пароль неверный";
  }
}
?>