<?php
require_once "lib/lib.inc.php";

header("Content-type: text/plain; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

if (isset($_REQUEST['fontfamily'])) {
    $fontfamily = stripslashes($_REQUEST['fontfamily']);
    $exploded = multiexplode(array(",",".","-","_"," "),$fontfamily);
    $font = $exploded[0];
    $font_url = str_replace(' ', '-', $fontfamily);
    $myFontCss = 'css/myfont.css';
    if(is_file($myFontCss)){
        $fp = fopen($myFontCss, 'a+');
        $fontStyle = '@font-face {
            font-weight: normal;
            font-style: normal;
            font-family: '.$font.';
            src: local(\''.$font.'\');
            src: url(\'/fonts/'.$font_url.'.eot\');
            src: url(\'/fonts/'.$font_url.'.eot#iefix\') format(\'embedded-opentype\'),
            url(\'/fonts/'.$font_url.'.woff\') format(\'woff\'),
            url(\'/fonts/'.$font_url.'.ttf\') format(\'truetype\'),
            url(\'/fonts/'.$font_url.'.svg\') format(\'svg\');
        }';
        $writeCss = fwrite($fp, $fontStyle . PHP_EOL);
        fclose($fp);
    }
    if ($fontfamily == '') {
        unset($fontfamily);
    }
}