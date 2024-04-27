<?php

session_start();

require_once "db.php";

if (!empty($_SESSION['auth']) and $_SESSION['status'] === 'admin') {
  echo "Контент для админов";
}

$query = "SELECT * FROM users";
$res = mysqli_query($link, $query);
?>

<table border="2px">
  <tr>
    <th>логин</th>
    <th>статус</th>
  </tr>
  <?php while ($users = mysqli_fetch_assoc($res)): ?>
    <tr>
      <td><?= $users['login'] ?></td>
      <td><?= $users['status'] ?></td>
    </tr>
  <?php endwhile; ?>
</table>