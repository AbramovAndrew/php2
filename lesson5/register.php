<?php
	include 'linkdb.php';
    // var_dump($_POST['login']);
    // var_dump($_POST['password']);
    // var_dump($_POST['confirm']);
	if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])) {
        
		if ($_POST['password'] == $_POST['confirm']) {
			$login = mysqli_real_escape_string($link, $_POST['login']);
		    $password = md5(mysqli_real_escape_string($link, $_POST['password']));
			
			$query = "SELECT * FROM users WHERE login='$login'";
			$user = mysqli_fetch_assoc(mysqli_query($link, $query));
			
			if (empty($user)) {
				$query = "INSERT INTO users SET login='$login', password='$password'";
				mysqli_query($link, $query);
				
				$_SESSION['auth'] = true;
				$id = mysqli_insert_id($link);
				$_SESSION['id'] = $id;
			} else {
				// Логин занят
			}
		} else {
			// Пароль и подтверждение не совпадают
		}
	}
?>
<form action="" method="POST">
    <div><label>Логин <input name="login"></label></div>
    <div><label>Пароль <input name="password" type="password"></label></div>
	<div><label>Повторите пароль <input name="confirm" type="password"></label></div>
	<input type="submit" value="Отправить">
</form>