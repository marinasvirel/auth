<?php

session_start();

echo "<header style='background-color: black; color: white; margin-bottom: 20px;'>";

if (!empty($_SESSION['auth'])) {
  echo "Привет, " . $_SESSION['login'] . "!<br>";
  echo "Ваш статус: " . $_SESSION['status'] . ".<br>";
  if($_SESSION['status'] == "admin"){
    echo "<a href='admin.php'>ссылка на админку</a>";
  }
} else {
  echo "<a href='login.php'>Авторизация</a>";
}

echo "</header>";