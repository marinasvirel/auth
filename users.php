<?php

require_once "db.php";
require_once "header.php";

$query = "SELECT * FROM users";
$res = mysqli_query($link, $query);
while ($users = mysqli_fetch_assoc($res)) {
  echo "<a href='profile.php?id={$users['id']}'>{$users['login']}</a>";
  echo "<br>";
}

