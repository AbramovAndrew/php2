<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Галерея. Урок №3 PHP2</title>
    <link rel="stylesheet" href="styles/gallery.css">
</head>
<body>
    <main>
<?php
require_once './vendor/autoload.php';
// Twig_Autoloader::register();
// var_dump(get_declared_classes());
// require_once './vendor/composer/autoload_classmap.php';
// require_once './vendor/composer/autoload_files.php';
// require_once './vendor/composer/autoload_namespaces.php';
// require_once './vendor/composer/autoload_psr4.php';
// require_once './vendor/composer/autoload_real.php';
// require_once './vendor/composer/autoload_static.php';
// require_once './vendor/composer/ClassLoader.php';

require_once './vendor/twig/twig/lib/Twig/Loader/Filesystem.php';
$loader = new Twig_loader_FileSystem('templates');
$twig = new Twig_Environment($loader);
$template = $twig->LoadTemplate('lesson3_1.html');

$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'gallery';


$link = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
mysqli_query($link, "SET NAMES 'utf8'");

$query = "SELECT * FROM gall_gen LIMIT 5";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row)
{
    $row['link_small'] = "images/small/".$row['link_small'];
    $row['link_big'] = "lesson3_2.php?img=".$row['id'];
};

echo $template->render(array('data' => $data));
?>
    </main>
    <button class="more">Еще</button>

    <script>
        (function() {
            function ajaxRequest()
            {try{var request = new XMLHttpRequest();}
                catch(e1){try{request = new ActiveXObject("Msxml2.XMLHTTP");}
                    catch(e2){try{request = new ActiveXObject("Microsoft.XMLHTTP");}
                        catch(e3){request = false;}}}
                return request;
            }
            
            var set = 0;
            document.querySelector('.more').addEventListener('click', function()
            {
                var params = 'set=' + ++set;
                request = new ajaxRequest();
                request.open("POST", "addajax.php", true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.setRequestHeader("Content-length", params.length);
                request.setRequestHeader("Connection", "close");
                request.onreadystatechange = function()
                {
                    if (this.readyState == 4)
                    {
                        if (this.status == 200)
                        {
                            if (this.responseText != null)
                            {
                                document.querySelector('main').insertAdjacentHTML('beforeEnd', this.responseText);
                            }
                            else alert("Ошибка AJAX: Данные не получены");
                        }
                        else alert( "Ошибка AJAX: " + this.statusText);
                    }
                }
                request.send(params);
            });
        }());
    </script>
</body>
</html>