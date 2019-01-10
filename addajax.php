<?php
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = 'gallery';
    
    require_once './vendor/autoload.php';
    require_once './vendor/twig/twig/lib/Twig/Loader/Filesystem.php';
    $loader = new Twig_loader_FileSystem('templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->LoadTemplate('lesson4_1.html');    
    

    if (isset($_POST['set'])) {
        $set = (int) $_POST['set'];
        
        $link = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
        mysqli_query($link, "SET NAMES 'utf8'");
        
        $upLimit = $set * 5;
        $query = "SELECT * FROM gall_gen LIMIT $upLimit, 5";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row)
        {
            $row['link_small'] = "images/small/".$row['link_small'];
            $row['link_big'] = "lesson4_2.php?img=".$row['id'];
        };

        echo $template->render(array('data' => $data));
    }
?>