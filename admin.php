<?php

session_start();

require_once "db.php";
require_once "header.php";

if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $query = "DELETE FROM users WHERE id = $id";
  $res = mysqli_query($link, $query);
}
?>

<?php if (!empty($_SESSION['auth']) and $_SESSION['status'] === 'admin'): ?>

  <table border="1px">
    <tr>
      <th>логин</th>
      <th>статус</th>
    </tr>
    <?php foreach ($users as $user): ?>
      <?php
      if (isset($_GET['right']) && $user['status'] == "admin") {
        $id = $_GET['right'];
        $query = "UPDATE users SET status='user' WHERE id=$id";
        mysqli_query($link, $query);
      }

      if (isset($_GET['right']) && $user['status'] == "user") {
        $id = $_GET['right'];
        $query = "UPDATE users SET status='admin' WHERE id=$id";
        mysqli_query($link, $query);
      }

      if ($user['status'] == "admin") {
        $color = "red";
        $right_text = "сделать юзером";
      }
      if ($user['status'] == "user") {
        $color = "green";
        $right_text = "сделать админом";
      }
      ?>
      <tr style="background-color: <?= $color ?>">
        <td><?= $user['login'] ?></td>
        <td><?= $user['status'] ?></td>
        <td><a href="?del=<?= $user['id'] ?>">удалить</a></td>
        <td><a href="?right=<?= $user['id'] ?>"><?= $right_text ?></a></td>
      </tr>
    <?php endforeach ?>
  </table>
<?php endif; ?>