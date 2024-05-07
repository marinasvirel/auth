<?php

session_start();
require_once "db.php";
require_once "header.php";

$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id='$id'";

$res = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($res);
?>

<form action="" method="POST">
	<input name="name" value="<?= $user['name'] ?>">
	<input name="surname" value="<?= $user['surname'] ?>">
	<input type="submit" name="submit">
</form>

<?php
	if (!empty($_POST['submit'])) {
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		
		$query = "UPDATE users SET name='$name', surname='$surname' WHERE id=$id";
		mysqli_query($link, $query);
	}
?>

