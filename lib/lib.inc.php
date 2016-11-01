<?php
function clearStr($data){
    return strip_tags(trim($data));
}

function clearInt($data){
    return abs((int)$data);
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
    $font_url = str_replace(' ', '-', $filename);
    $size = clearInt($_POST['size-form']);
    if($size == '') $size = '18';
    $weight = clearInt($_POST['weight-form']);
    if($weight == '') $weight = '100';
    $style = clearStr($_POST['style-form']);
    if($style == '') $style = 'normal';
    return array('extension'=>$ext, 'filename'=>$filename, 'fontfamely'=>$fontfamely, 'font_url'=>$font_url, 'font'=>$filename, 'size'=>$size, 'weight'=>$weight, 'style'=>$style);
}

//function createDiv(){
//    if (!isset($_SESSION['counter'])) $_SESSION['counter']=0;
//    $id = $_SESSION['counter']++;
//    $res = createFont($filename);

//    ${'size' . $id} = $res['size'];
//    ${'font' . $id} = $res['font'];
//    ${'filename' . $id} = $res['filename'];
//    ${'font_url' . $id} = $res['font_url'];
//    ${'weight' . $id} = $res['weight'];
//    ${'style' . $id} = $res['style'];
//
//    var_dump( $res['size']);
//
//for ($i = 1; $i<$id; $i++){
//    echo <<<HTML
//
//    <p>{$res['size']}px</p>
//<div id='$i' style="font-size: {$res['size']}px;font-weight: {$res['weight']};">CREATE BLOCK</div>
//HTML;
//}
//    return;
//}