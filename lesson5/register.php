<?php
	include 'linkdb.php';
	// Если форма регистрации отправлена...
	if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])) {
	
		// Если пароль и подтверждение совпадают...
		if ($_POST['password'] == $_POST['confirm']) {
			
			// Пишем логин и пароль из формы в переменные для удобства работы:
			$login = $_POST['login'];
			$password = $_POST['password'];
			
			// Пробуем получить юзера с таким логином
			$query = "SELECT * FROM users WHERE login='$login'";
			$user = mysqli_fetch_assoc(mysqli_query($link, $query));
			
			// Если юзера с таким логином нет
			if (empty($user)) {
				// Формируем и отсылаем SQL запрос:
				$query = "INSERT INTO users SET login='$login', password='$password'";
				mysqli_query($link, $query);
				
				// Пишем в сессию пометку об авторизации:
				$_SESSION['auth'] = true;
				
				// Получаем id вставленной записи и пишем его в сессию
				$id = mysqli_insert_id($link);
				$_SESSION['id'] = $id;
			} else {
				// Логин занят, выведем сообщение об этом
			}
		} else {
			// Пароль и подтверждение НЕ совпадают - выведем сообщение
		}
	}
?>
<form action="" method="POST">
    <div><label>Логин <input name="login"></label></div>
    <div><label>Пароль <input name="password" type="password"></label></div>
	<div><label>Повторите пароль <input name="password" type="confirm"></label></div>
	<input type="submit" value="Отправить">
</form>