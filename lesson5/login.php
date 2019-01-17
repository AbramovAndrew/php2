<?php
	$dbHost = 'localhost';
	$dbUser = 'root';
	$dbPassword = '';
	$dbName = 'signin';
	$link = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
	mysqli_query($link, "SET NAMES 'utf8'");
	
	if (!empty($_POST['password']) and !empty($_POST['login'])) {
		$login = mysqli_real_escape_string($link, $_POST['login']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
		
		$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
		$result = mysqli_query($link, $query);
		$user = mysqli_fetch_assoc($result);
		
		if (!empty($user)) {
			header('Location: http://localhost/php2/php2.git/lesson5/index.php');
		} else {
			echo "No\n";
		}
	}
?>
<form action="" method="POST">
	<input name="login">
	<input name="password" type="password">
	<input type="submit" value="Отправить">
</form>