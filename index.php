<?php
// ⊗ppPmAuSs

session_start();

echo "текст для всех<br>";

if (!empty($_SESSION['auth'])) {
  echo 'текст только для авторизованного пользователя';
} 