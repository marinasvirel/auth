<?php

session_start();

require_once "db.php";

if (!empty($_SESSION['auth']) and $_SESSION['status'] === 'admin') {
  echo "Контент для админов";
}