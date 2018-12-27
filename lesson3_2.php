<?php
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = 'gallery';
    $link = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    mysqli_query($link, "SET NAMES 'utf8'");
    
    if (isset($GET['img'])) {
        $id = (int)($_GET['img']);
        $query = "SELECT * FROM gall_gen WHERE id='$id'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $img = mysqli_fetch_assoc($result);
        
    }
?>