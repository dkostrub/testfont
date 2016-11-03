<?php
$dir = 'fonts/';
$skip = array('.', '..');
$files = scandir($dir);

foreach($files as $val){
    if(!in_array($val,$skip)){
        $val = substr($val, 0, strpos($val, '.'));
//        $val = str_replace(' ', '-', $val);
        $arr[]=$val;
    }
}
$result = array_unique($arr);

$font = basename($_FILES['filename']['name'][$k]);
if(isset($_POST['update']) ){
    $res = createFont($font);
    $filename = $res['filename'];
    $myFontCss = 'css/myfont.css';
    if(is_file($myFontCss)){
        $fp = fopen($myFontCss, 'w');
        $fontStyle = '@font-face {
            font-weight: normal;
            font-style: normal;
            font-family: '.$res['fontfamely'].';
            src: local(\''.$res['fontfamely'].'\');
            src: url(\'/fonts/'.$res['font_url'].'.eot\');
            src: url(\'/fonts/'.$res['font_url'].'.eot#iefix\') format(\'embedded-opentype\'),
            url(\'/fonts/'.$res['font_url'].'.woff\') format(\'woff\'),
            url(\'/fonts/'.$res['font_url'].'.ttf\') format(\'truetype\'),
            url(\'/fonts/'.$res['font_url'].'.svg\') format(\'svg\');
        }';
        $writeCss = fwrite($fp, $fontStyle);
        fclose($fp);
    }
}

$lang = ['ua' => 'Українська', 'ru' => 'Русский', 'es' => 'English'];

require_once "select_font.php";
?>
<div class="content">
    <div class="row">
        <div class="test">
            <div id='0' class="col-md-12 text">
                <div class="form-font">
                    <form action="" method="post" enctype="multipart/form-data">
                        <fieldset class="options">
                            <div class="field col-md-4">
                                <label for="size">Font size</label><br/>
                                <input name="size-form" type="number" min="1" max="100" value="<?=$res['size']?>" step="1" id="size"/>
                            </div>
                            <div class="field col-md-4">
                                <label for="weight">Font weight</label><br/>
                                <select name="weight-form" id="weight">
                                    <?php
                                    for ($i = 100; $i <=900; $i+=100) {
                                        $selected = '';
                                        if($_POST['weight-form'] == $i) $selected = 'selected';
                                        echo "<option value=" . $i . ">" . $i . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="field col-md-4">
                                <label for="style">Font style</label><br/>
                                <select name="style-form" id="style">
                                    <option value="normal" <?php if($_POST['style-form'] == 'normal'){echo "selected='selected'";}?>>normal</option>
                                    <option value="italic" <?php if($_POST['style-form'] == 'italic'){echo "selected='selected'";}?>>italic</option>
                                    <option value="oblique" <?php if($_POST['style-form'] == 'oblique'){echo "selected='selected'";}?>>oblique</option>
                                </select>
                            </div>
                            <input type="button" value="Reload" name="reload" class="add reload"/>
                        </fieldset>
                    </form>
                            <p>Font: <span style="font-size: 18px; font-weight: bold"><?=$res['font']?></span></p>
                            <p>Size: <?=$res['size']?></p>
                            <p>Weight: <?=$res['weight']?></p>
                            <p>Style: <?=$res['style']?></p>
                            <p>Lang: <?=$lang['ru']?></p>
                            <p>Reload</p>
                </div>
                <div class="title" style="font-family: <?=$res['fontfamely']?>; font-style: <?=$res['style']?>;">
                    <h1>(H1) Первый новый год</h1>
                    <h2>(H2) Первый новый год</h2>
                    <h3>(H3) Первый новый год</h3>
                    <h4>(H4) Первый новый год</h4>
                    <h5>(H5) Первый новый год</h5>
                    <h6>(H6) Первый новый год</h6>
                </div>
                <div class="txt" style="font-family: <?=$res['fontfamely']?>; ont-weight: <?=$res['weight']?>; font-style: <?=$res['style']?>;">
                    <div class="font">
                        <span><?=$res['size']?>px</span>
                        <p style="font-size: <?=$res['size']?>px; ">
                            Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
                        </p>
                        <p style="font-size: <?=$res['size']?>px; ">
                            АБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЪЭЮЯ
                        </p>
                        <p style="font-size: <?=$res['size']?>px; ">
                            абвгдежзийклмнопрстуфхцчшщьъэюя
                        </p>
                    </div>
                    <div class="font">
                        <span><?=$res['size']-2?>px</span>
                        <p style="font-size: <?=$res['size']-2?>px; ">
                            Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
                        </p>
                        <p style="font-size: <?=$res['size']-2?>px; ">
                            АБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЪЭЮЯ
                        </p>
                        <p style="font-size: <?=$res['size']-2?>px; ">
                            абвгдежзийклмнопрстуфхцчшщьъэюя
                        </p>
                    </div>
                    <div class="font">
                        <span><?=$res['size']-4?>px</span>
                        <p style="font-size: <?=$res['size']-4?>px; ">
                            Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
                        </p>
                        <p style="font-size: <?=$res['size']-4?>px; ">
                            АБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЪЭЮЯ
                        </p>
                        <p style="font-size: <?=$res['size']-4?>px; ">
                            абвгдежзийклмнопрстуфхцчшщьъэюя
                        </p>
                    </div>
                    <div class="font">
                        <span><?=ceil($res['size']/2)?>px</span>
                        <p style="font-size: <?=ceil($res['size']/2)?>px;">
                            Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
                        </p>
                        <p style="font-size: <?=ceil($res['size']/2)?>px; ">
                            АБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЪЭЮЯ
                        </p>
                        <p style="font-size: <?=ceil($res['size']/2)?>px; ">
                            абвгдежзийклмнопрстуфхцчшщьъэюя
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-block">
            <div class="col-md-4">
                <h1>Кнопки с иконкой</h1>
                <p>&nbsp;</p>
                <div class="sample">
                    <button style="font-family: <?=$res['fontfamely']?>;" class="btn btn-sm"><div><i class="ico icon-user"></i>Маленькая кнопка</div></button>
                </div>
                <div class="sample">
                    <button style="font-family: <?=$res['fontfamely']?>;" class="btn"><div><i class="ico icon-user"></i>Кнопка</div></button>
                </div>
                <div class="sample">
                    <button style="font-family: <?=$res['fontfamely']?>;" class="btn btn-sm-square"><div><i class="ico icon-user"></i>Средняя кнопка</div></button>
                </div>
                <div class="sample">
                    <button style="font-family: <?=$res['fontfamely']?>;" class="btn btn-square"><div><i class="ico icon-user"></i>Большая кнопка</div></button>
                </div>
            </div>
            <div class="col-md-4">
                <h1>Кнопки</h1>
                <p>&nbsp;</p>
                <div class="sample">
                    <button style="font-family: <?=$res['fontfamely']?>;" class="btn btn-sm""><div>Маленькая кнопка</div></button>
                </div>
                <div class="sample">
                    <button style="font-family: <?=$res['fontfamely']?>;" class="btn"><div>Кнопка</div></button>
                </div>
                <div class="sample">
                    <button style="font-family: <?=$res['fontfamely']?>;" class="btn btn-sm-square"><div>Средняя кнопка</div></button>
                </div>
                <div class="sample">
                    <button style="font-family: <?=$res['fontfamely']?>;" class="btn btn-square"><div>Большая кнопка</div></button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form_block">
                    <div class="form_block__label">
                        <label>Дефолтный поинт</label>
                    </div>
                    <div class="form_block__input">
                        <input style="font-family: <?=$res['fontfamely']?>;" type="text" placeholder="Введи сюда текст...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>