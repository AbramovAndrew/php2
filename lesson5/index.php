<?php
    session_start();
    if (!empty($_SESSION['auth'])) {
        // $a = $_SESSION['auth'];
        // var_dump($a);
        echo "OK\n";
	}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Главная</title>
</head>
<body>
    <h1>Главная</h1>
</body>
</html>