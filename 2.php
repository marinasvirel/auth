<?php

session_start();

if (!empty($_SESSION['auth'])) {
  echo 'текст только для авторизованного пользователя';
} else {
  echo "страница не доступна";
}