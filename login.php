<?php
// ⊗ppPmAuAt
require_once "db.php";

$show = true;

if (!empty($_POST['login']) && !empty($_POST['password'])) {
  $login = $_POST['login'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE `login`='$login' AND `password`='$password'";
  $res = mysqli_query($link, $query);
  $user = mysqli_fetch_assoc($res);

  if (!empty($user)) {
    echo "прошел авторизацию";
    $show = false;
    header('Location: index.php');
  } else {
    echo "неверный логин или пароль";
  }
}
?>

<?php if($show): ?>
<form action="" method="POST">
  <input name="login" placeholder="логин">
  <input name="password" type="password" placeholder="пароль">
  <input type="submit">
</form>
<?php endif; ?>