<?php
require_once "lib/lib.inc.php";

header("Content-type: text/plain; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

if (isset($_REQUEST['fontfamily'])) {
    $fontfamily = stripslashes($_REQUEST['fontfamily']);
    $font = str_replace(' ', '', $fontfamily);
    $font_url = str_replace('-', ' ', $fontfamily);
    $myFontCss = 'css/myfont.less';
    if(is_file($myFontCss)){
        $fp = fopen($myFontCss, 'a+');
        $fontStyle = '@font-face {            
            font-family: '.$font.';
            src: local(\''.$font_url.'\'),
                 local(\''.$fontfamily.'\');
            src: url(\'/fonts/'.$fontfamily.'.eot\');
            src: url(\'/fonts/'.$fontfamily.'.eot#iefix\') format(\'embedded-opentype\'),
            url(\'/fonts/'.$fontfamily.'.woff\') format(\'woff\'),            
            url(\'/fonts/'.$fontfamily.'.ttf\') format(\'truetype\'),
            url(\'/fonts/'.$fontfamily.'.svg\') format(\'svg\');
            font-weight: normal;
            font-style: normal;
        }';
        $writeCss = fwrite($fp, $fontStyle . PHP_EOL);
        fclose($fp);
    }
    if ($fontfamily == '') {
        unset($fontfamily);
    }
}