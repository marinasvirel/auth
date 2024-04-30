<?php

session_start();

require_once "db.php";

$query = "SELECT * FROM users";
$res = mysqli_query($link, $query);
?>

<?php if (!empty($_SESSION['auth']) and $_SESSION['status'] === 'admin'): ?>

  <table border="2px" style="width: 50%;">
    <tr>
      <th>логин</th>
      <th>статус</th>
    </tr>
    <?php while ($users = mysqli_fetch_assoc($res)): ?>
      <?php
      $color = "green";
      if ($users['status'] == "admin") {
        $color = "red";
      }
      ?>
      <tr style="background-color: <?= $color ?>">
        <td><?= $users['login'] ?></td>
        <td><?= $users['status'] ?></td>
        <td><a href="?del=<?= $users['id'] ?>">удалить</a></td>
      </tr>
    <?php endwhile; ?>
  </table>

<?php endif; ?>

<?php
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $query = "DELETE FROM users WHERE id = $id";
  $res = mysqli_query($link, $query);
}
?>