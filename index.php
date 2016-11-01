<?php
session_start();
require_once "lib/lib.inc.php";
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
    if($_POST['update']){
    $fontfamely = $res['fontfamely'];
    $font_url = $res['font_url'];
    echo <<<HTML
<style type=”text/css”>
    @font-face {
        font-weight: normal;
        font-style: normal;
        font-family: $fontfamely;
        src: local('$fontfamely');
        src: url('fonts/$font_url.eot');
        src: url('fonts/$font_url.eot#iefix') format('embedded-opentype'),
        url('fonts/$font_url.woff') format('woff'),
        url('fonts/$font_url.ttf') format('truetype'),
        url('fonts/$font_url.svg') format('svg');
    }
</style>
HTML;
}
//session_destroy();
?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>