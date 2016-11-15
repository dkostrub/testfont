<?php
function clearStr($data){
    return strip_tags(trim($data));
}

function clearInt($data){
    return abs((int)$data);
}

function loadFont(){
    if(isset($_FILES)){
        foreach ($_FILES['filename']['name'] as $k=>$v){
            $path_info = pathinfo(basename($_FILES['filename']['name'][$k]));
            $filename = str_replace(' ', '-',  $path_info['filename']);
            $ext = $path_info['extension'];
            $uploaddir = 'fonts/';
//                $uploadfile = $uploaddir . basename($_FILES['filename']['name'][$k]);
            $uploadfile = $uploaddir . $filename.'.'.$ext;

            if($_FILES['filename']['type'][$k] == "image/svg+xml" ||
                $_FILES['filename']['type'][$k] == "application/font-woff" ||
                $_FILES['filename']['type'][$k] == "application/font-woff2" ||
                $_FILES['filename']['type'][$k] == "application/octet-stream"){

                $blacklist = array(".php", ".phtml", ".php3", ".php4");
                foreach ($blacklist as $item){
                    if(preg_match("/$item\$/i", $_FILES['filename']['name'][$k])) exit;
                }
                if(is_uploaded_file($_FILES["filename"]["tmp_name"][$k])){
                    move_uploaded_file($_FILES['filename']['tmp_name'][$k], $uploadfile);
                }else{
                    echo "Файл не загружен, попробуйте еще раз.";
                    require_once "load.php";
                    exit;
                }
            }else{
                $err = "Ошибка загрузки файла!";
                require_once "load.php";
                exit;
            }
        }
    }
    return $font = basename($_FILES['filename']['name'][$k]);
}

function multiexplode ($delimiters,$string) {
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

function createFont($filename){
    $path_info = pathinfo($filename);
    $ext = $path_info['extension'];
    $filename = $path_info['filename'];
    if(clearStr($_POST['font-form']))
        $filename = clearStr($_POST['font-form']);
    $exploded = multiexplode(array(",",".","-","_"," "),$filename);
    $fontfamely = $exploded[0];
    $font_url = $filename;
    $size = clearInt($_POST['size-form']);
    if($size == '') $size = '18';
    $weight = clearInt($_POST['weight-form']);
    if($weight == '') $weight = '100';
    $style = clearStr($_POST['style-form']);
    if($style == '') $style = 'normal';
    return array('extension'=>$ext, 'filename'=>$filename, 'fontfamely'=>$fontfamely, 'font_url'=>$font_url, 'font'=>$filename, 'size'=>$size, 'weight'=>$weight, 'style'=>$style);
}