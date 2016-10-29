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

$res = createFont($_FILES['filename']['name'][$k]);
$filename = $res['filename'];
if($_POST['update']){
    $exploded = multiexplode(array(",",".","-","_"," "),$filename);
    $fontfamely = $exploded[0];
    $font_url = str_replace(' ', '-', $filename);
    $size = '18';
    $weight = '100';
    $style = 'normal';
    $font = $filename;
}
$lang = ['ua' => 'Українська', 'ru' => 'Русский', 'es' => 'English'];

require_once "select_font.php";
?>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <p>Font: <span style="font-size: 18px; font-weight: bold"><?=$font?></span></p>
            <p>Size: <?=$size?></p>
            <p>Weight: <?=$weight?></p>
            <p>Style: <?=$style?></p>
            <p>Lang: <?=$lang['ru']?></p>
            <p>Reload</p>
            <div class="title" style="font-family: <?=$fontfamely?>; font-style: <?=$style?>;">
                <h1>(H1) Первый новый год</h1>
                <h2>(H2) Первый новый год</h2>
                <h3>(H3) Первый новый год</h3>
                <h4>(H4) Первый новый год</h4>
                <h5>(H5) Первый новый год</h5>
                <h6>(H6) Первый новый год</h6>
            </div>
            <div class="txt" style="font-family: <?=$fontfamely?>; font-weight: <?=$weight?>; font-style: <?=$style?>;">
                <div class="font">
                    <span><?=$size?>px</span>
                    <p style="font-size: <?=$size?>px; ">
                        Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
                    </p>
                </div>
                <div class="font">
                    <span><?=$size-2?>px</span>
                    <p style="font-size: <?=$size-2?>px;">
                        Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
                    </p>
                </div>
                <div class="font">
                    <span><?=$size-4?>px</span>
                    <p style="font-size: <?=$size-4?>px;">
                        Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
                    </p>
                </div>
                <div class="font">
                    <span><?=ceil($size/2)?>px</span>
                    <p style="font-size: <?=ceil($size/2)?>px;">
                        Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="txt" style="font-family: <?=$fontfamely?>; font-weight: <?=$weight?>; font-style: <?=$style?>;">
                <p style="font-size: <?=$size?>px; ">
                    АБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЪЭЮЯ
                </p>
                <p style="font-size: <?=$size?>px; ">
                    абвгдежзийклмнопрстуфхцчшщьъэюя
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="txt" style="font-family: <?=$fontfamely?>; font-weight: <?=$weight?>; font-style: <?=$style?>;">
                <p style="font-size: <?=$size?>px; ">
                    АБВГДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯ
                </p>
                <p style="font-size: <?=$size?>px; ">
                    абвгдеєжзиіїйклмнопрстуфхцчшщьюя
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="btn-block col-md-4">
            <h1>Кнопки с иконкой</h1>
            <p>&nbsp;</p>
            <div class="sample">
                <button class="btn btn-sm" style="font-family: <?=$fontfamely?>;"><div><i class="ico icon-user"></i>Маленькая кнопка</div></button>
            </div>
            <div class="sample">
                <button class="btn" style="font-family: <?=$fontfamely?>;"><div><i class="ico icon-user"></i>Кнопка</div></button>
            </div>
            <div class="sample">
                <button class="btn btn-sm-square" style="font-family: <?=$fontfamely?>;"><div><i class="ico icon-user"></i>Средняя кнопка</div></button>
            </div>
            <div class="sample">
                <button class="btn btn-square" style="font-family: <?=$fontfamely?>;"><div><i class="ico icon-user"></i>Большая кнопка</div></button>
            </div>
        </div>
        <div class="col-md-4">
            <h1>Кнопки</h1>
            <p>&nbsp;</p>
            <div class="sample">
                <button class="btn btn-sm" style="font-family: <?=$fontfamely?>;"><div>Маленькая кнопка</div></button>
            </div>
            <div class="sample">
                <button class="btn" style="font-family: <?=$fontfamely?>;"><div>Кнопка</div></button>
            </div>
            <div class="sample">
                <button class="btn btn-sm-square" style="font-family: <?=$fontfamely?>;"><div>Средняя кнопка</div></button>
            </div>
            <div class="sample">
                <button class="btn btn-square" style="font-family: <?=$fontfamely?>;"><div>Большая кнопка</div></button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form_block">
                <div class="form_block__label">
                    <label>Дефолтный поинт</label>
                </div>
                <div class="form_block__input">
                    <input style="font-family: <?=$fontfamely?>;" type="text" placeholder="Введи сюда текст...">
                </div>
            </div>
        </div>
    </div>
</div>
