<?php
//session_start();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Cache-Control: post-check=0,pre-check=0", false);
header("Cache-Control: max-age=0", false);
header("Pragma: no-cache");
require_once "lib/lib.inc.php";

////serializeArray
//if(isset($_POST['form_data'])) {
//    $req = false; // изначально переменная для "ответа" - false
//    // Приведём полученную информацию в удобочитаемый вид
//    ob_start();
//    echo '<pre>';
//    print_r($_POST['form_data']);
//    echo '</pre>';
//    $req = ob_get_contents();
//    ob_end_clean();
//    echo json_encode($req); // вернем полученное в ответе
//    exit;
//}

////serialize
//if(isset($_POST['form_data'])){
//    $req = false;
//    parse_str($_POST['form_data'], $form_data);
//    ob_start();
//    echo 'До обработки: ' . $_POST['form_data'];
//    echo 'После обработки:';
//    echo '<pre>';
//    print_r($form_data);
//    echo '</pre>';
//    $req = ob_get_contents();
//    ob_end_clean();
//    json_encode($req); // вернем полученное в ответе
//    exit;
//}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <title>Тестирование различных шрифтов</title>

    <link href='https://fonts.googleapis.com/css?family=PT+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="css/main.css?<?php echo rand(0, 99999) ?>" />
    <link rel="stylesheet" type="text/css" href="css/font.css" />
    <link rel="stylesheet" type="text/css" href="css/myfont.css" />
</head>
<body>
<div class="container">
    <?php
    if(isset($_POST['update'])){
        if (isset($err)){
            header ("location: {$_SERVER['REQUEST_URI']} ");
            exit;
        }
        if(isset($_FILES)){
            foreach ($_FILES['filename']['name'] as $k=>$v){
                $uploaddir = 'fonts/';
                $uploadfile = $uploaddir . basename($_FILES['filename']['name'][$k]);

                if($_FILES['filename']['type'][$k] == "image/svg+xml" ||
                    $_FILES['filename']['type'][$k] == "application/font-woff" ||
                    $_FILES['filename']['type'][$k] == "application/font-woff2" ||
                    $_FILES['filename']['type'][$k] == "application/octet-stream"){

                    $blacklist = array(".php", ".phtml", ".php3", ".php4");
                    foreach ($blacklist as $item){
                        if(preg_match("/$item\$/i", $_FILES['filename']['name'][$k])) exit;
                    }
                    if(is_uploaded_file($_FILES["filename"]["tmp_name"][$k])){
//                        createFont($_FILES['filename']['name'][$k]);
                        move_uploaded_file($_FILES['filename']['tmp_name'][$k], $uploadfile);
                        require_once 'font_test.php';
                    }else{
                        include "load.php";
                        echo "Файл не загружен, вернитесь и попробуйте еще раз.";
                    }
                }else{
                    $err = "Ошибка загрузки файла!";
                    include "load.php";
                }
            }
        }
    }else{
        if(isset($_POST['submit'])){
            include 'font_test.php';
        }else{
            include "load.php";
        }
    }
    ?>
</div>

<svg style="display:none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
</svg>

<?php

//session_destroy();
?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="js/main.js?<?php echo rand(0, 99999) ?>"></script>
<!--<script src="js/test.js"></script>-->

</body>
</html>