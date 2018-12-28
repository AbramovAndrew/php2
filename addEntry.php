<?php
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = 'gallery';
    
    // $dbUser = 'host1590973';
    // $dbPassword = 'c563590a';
    // $dbName = 'host1590973_abramov1';
    $link = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    mysqli_query($link, "SET NAMES 'utf8'");
    
    for ($i = 21; $i <= 100; $i++)
    {
        $num = rand(1, 6);
        $query = "INSERT INTO `gall_gen` (`descr_alt`, `descr_cap`, `link_big`, `link_small`) VALUES
        (
            'Восхитительное фото космического пространства № $i',
            'Снимок телескопа Hubble № $i передает все богатство красок дальнего космоса',
            '00{$num}_big.jpg',
            '00{$num}_small.jpg'
        )";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
    }
?>