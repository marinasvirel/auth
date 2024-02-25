<?php
// ⊗ppPmAuSs

session_start();

if (!empty($_SESSION['auth'])) {
  echo "Привет, " . $_SESSION['login'] . "!<br>";
} else {
  echo "<a href='login.php'>Авторизация</a>";
}