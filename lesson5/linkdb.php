<?php
    $dbHost = 'localhost';
	$dbUser = 'root';
	$dbPassword = '';
	$dbName = 'signin';
	$link = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    mysqli_query($link, "SET NAMES 'utf8'");
?>