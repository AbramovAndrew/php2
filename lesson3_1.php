<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Галерея. Урок №3 PHP2</title>
</head>
<body>

<?php
require_once 'twig/Autoloader.php';
Twig_Autoloader::register();
	
$loader = new Twig_loader_FileSystem('templates');
$twig = new Twig_Environment($loader);
$template = $twig->LoadTemplate('lesson_3.html');





$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'gallery';
$link = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
mysqli_query($link, "SET NAMES 'utf8'");

$query = "SELECT * FROM gall_gen";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
// var_dump($data);

echo $template->render(array('data' => $data));	
?>
	

</body>
</html>