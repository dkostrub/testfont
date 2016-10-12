<?php
$dir = 'fonts/';
$skip = array('.', '..');
$files = scandir($dir);

foreach($files as $val){
    if(!in_array($val,$skip)){
        $val = substr($val, 0, strpos($val, '.'));
//        $val = str_replace(' ', '_', $val);
        $arr[]=$val;
    }
}
$result = array_unique($arr);
?>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data" class="font-form">
                <fieldset class="options fix">
                    <div class="main">
                        <div class="field">
                            <label for="font">Select font</label>
                            <select name="font-form" id="font">
                                <?php
                                sort($result, SORT_NATURAL | SORT_FLAG_CASE);
                                foreach ($result as $file) {
                                    $selected = '';
                                    if ($_POST['font-form'] == $file) $selected = 'selected';
                                    echo "<option value=\"" . $file . "\" " . $selected . ">" . $file . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="field col-md-4">
                            <label for="size">Font size</label><br/>
                            <input name="size-form" type="number" min="1" max="100" value="<?=$size?>" step="1" id="size"/>
                        </div>
                        <div class="field col-md-4">
                            <label for="weight">Font weight</label><br/>
                            <select name="weight-form" id="weight">
                                <?php
                                for ($i = 100; $i <=900; $i+=100) {
                                $selected = '';
                                if ($_POST['weight-form'] == $i) $selected = 'selected';
                                echo "<option value=\"" . $i . "\" " . $selected . ">" . $i . "</option>";
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
                    </div>
                </fieldset>
                <input type="submit" value="Применить стили" name="submit" class="add add-upd"/>
            </form>
            <div class="add add-font">
                <a href="">Добавить новый шрифт</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="title" style="font-family: <?=$fontfamely?>; font-style: <?=$style?>;">

                <h1>(H1) Товары со скидкой</h1>
                <h2>(H2) Комментарии</h2>
                <h3>(H3) Первый новый год</h3>

            </div>
            <div class="txt" style="font-family: <?=$fontfamely?>; font-weight: <?=$weight?>; font-style: <?=$style?>;">

                <p style="font-size: <?=$size?>px; ">
                    Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
                </p>

                <p style="font-size: <?=$size-2?>px;">
                    Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
                </p>

                <p style="font-size: <?=$size-4?>px;">
                    Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
                </p>

                <p style="font-size: <?=ceil($size/2)?>px;">
                    Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).
                </p>
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