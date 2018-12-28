<?php
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = 'gallery';
    
    
    

    if (isset($_POST['set'])) {
        $set = (int) $_POST['set']);
        
        $link = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
        mysqli_query($link, "SET NAMES 'utf8'");
        
        $query = "SELECT * FROM gall_gen LIMIT {$set * 5}, 5";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row)
        {
            $row['link_small'] = "images/small/".$row['link_small'];
            $row['link_big'] = "lesson3_2.php?img=".$row['id'];
        };

        echo $template->render(array('data' => $data));
        

        // echo file_get_contents('http://' . SanitizeString($_POST['url']));
    }
    // function SanitizeString($var)
    // {
    //     $var = strip_tags($var);
    //     $var = htmlentities($var);
    //     return stripslashes($var);
    // }
?>