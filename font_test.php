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
    <div data-id="0" class="cloneText" style="display: none">
        <div class="form-font">
            (
            <span class="font"><?=$res['font']?></span>
            <div class="style" data-object="0" id="0">
                <span class="selectedStyle">normal</span>
                <ul>
                    <li data-style="normal">normal</li>
                    <li data-style="italic">italic</li>
                    <li data-style="oblique">oblique</li>
                </ul>
            </div>
            <div class="weight" data-object="0" id="0">
                <span class="selectedWeight">100</span>
                <ul>
                    <?php
                    for ($i = 100; $i <=900; $i+=100) {
                        $selected = '';
                        if($_POST['weight-form'] == $i) $selected = 'selected';
                        echo "<li data-weight=" . $i . ">" . $i . "</li>";
                    }
                    ?>
                </ul>
            </div>
            )
            <span class="remove">&times;</span>
        </div>
        <div data-title-id="0" class="title" style="font-family: <?=$res['fontfamely']?>; font-style: <?=$res['style']?>;">
            <h1>(H1) Первый новый год</h1>
            <h2>(H2) Первый новый год</h2>
            <h3>(H3) Первый новый год</h3>
            <h4>(H4) Первый новый год</h4>
            <h5>(H5) Первый новый год</h5>
            <h6>(H6) Первый новый год</h6>
        </div>
        <div data-text-id="0" class="txt" style="font-family: <?=$res['fontfamely']?>; font-weight: <?=$res['weight']?>; font-style: <?=$res['style']?>;">
            <div class="font" id="1">
                <span><strong><?=$res['size']?>px</strong></span>
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
            <div class="font" id="2">
                <span><strong><?=$res['size']-2?>px</strong></span>
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
            <div class="font" id="3">
                <span><strong><?=$res['size']-4?>px</strong></span>
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
            <div class="font" id="4">
                <span><strong><?=ceil($res['size']/2)?>px</strong></span>
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
    <div class="row">
        <div class="test">
            <div data-id="0" class="text col-md-12">
                <div class="form-font">
                    (
                    <span class="font"><?=$res['font']?></span>
                    <div class="style" data-object="0" id="0">
                        <span class="selectedStyle">normal</span>
                        <ul>
                            <li data-style="normal">normal</li>
                            <li data-style="italic">italic</li>
                            <li data-style="oblique">oblique</li>
                        </ul>
                    </div>
                    <div class="weight" data-object="0" id="0">
                        <span class="selectedWeight">100</span>
                        <ul>
                            <?php
                            for ($i = 100; $i <=900; $i+=100) {
                                $selected = '';
                                if($_POST['weight-form'] == $i) $selected = 'selected';
                                echo "<li data-weight=" . $i . ">" . $i . "</li>";
                            }
                            ?>
                        </ul>
                    </div>
                    )
                    <span class="remove">&times;</span>
                </div>
                <div data-title-id="0" class="title" style="font-family: <?=$res['fontfamely']?>; font-style: <?=$res['style']?>;">
                    <h1>(H1) Первый новый год</h1>
                    <h2>(H2) Первый новый год</h2>
                    <h3>(H3) Первый новый год</h3>
                    <h4>(H4) Первый новый год</h4>
                    <h5>(H5) Первый новый год</h5>
                    <h6>(H6) Первый новый год</h6>
                </div>
                <div data-text-id="0" class="txt" style="font-family: <?=$res['fontfamely']?>; font-weight: <?=$res['weight']?>; font-style: <?=$res['style']?>;">
                    <div class="font" id="1">
                        <span><strong><?=$res['size']?>px</strong></span>
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
                    <div class="font" id="2">
                        <span><strong><?=$res['size']-2?>px</strong></span>
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
                    <div class="font" id="3">
                        <span><strong><?=$res['size']-4?>px</strong></span>
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
                    <div class="font"id="4">
                        <span><strong><?=ceil($res['size']/2)?>px</strong></span>
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
    </div>
</div>