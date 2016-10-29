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

function createFont($filename) {
    return pathinfo($filename);
//    $path_info = pathinfo($filename);
//    $ext = $path_info['extension'];
//    $filename = $path_info['filename'];
}

if(isset($_POST['submit'])){
    $font = clearStr($_POST['font-form']);
    $size = clearInt($_POST['size-form']);
    $weight = clearInt($_POST['weight-form']);
    $style = clearStr($_POST['style-form']);

    $exploded = multiexplode(array(",", ".", "-", "_", " "), $font);
    $fontfamely = $exploded[0];
    $font_url = str_replace(' ', '-', $font);
}
