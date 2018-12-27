
<?php
    require_once 'twig/Autoloader.php';
    Twig_Autoloader::register();
        
    $loader = new Twig_loader_FileSystem('templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->LoadTemplate('lesson3_2.html');
    
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = 'gallery';
    $link = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    mysqli_query($link, "SET NAMES 'utf8'");

    if (isset($_GET['img'])) {
        $id = (int) ($_GET['img']);
        $query = "SELECT * FROM gall_gen WHERE id='$id'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $img = mysqli_fetch_assoc($result);
        // var_dump($id);
        $img['link_big'] = "images/big/".$img['link_big'];
    }

    echo $template->render(array(
        'img' => $img,
        'title' => "Изображение № $id"
    ));
?>
