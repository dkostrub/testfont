$(document).ready(function() {
    var counter = 0;
    $('body').on('click', '.add-text', function (e) {
        counter++;
        var font, size, weight, style, fontfamely, font_url;

        var str = $('.font-form').serializeArray();
        font = str[0].value;
        size = str[1].value;
        weight = str[2].value;
        style = str[3].value;
        font_url = font.replace(/\s/gi, "-");

        var res = font.split(/([\s\-\_])/i);
        fontfamely = res[0];

        var size1, size2, size3;
        size1 = size-2;
        size2 = size-4;
        size3 = Math.ceil(size/2);

        // var text = $( ".content" ).load( "../font_test.php");
var i = '111';
        var text = '\
        <div id='+counter+' class="col-md-12 text">\
            <div class="form-add-font">\
                <p>Font: <span style="font-size: 18px; font-weight: bold">'+font+'</span></p>\
                <p>Size: '+size+'px</p>\
                <p>Weight: '+weight+'</p>\
                <p>Style: '+style+'</p>\
                <p>Lang: </p>\
                <p>Reload</p>\
            </div>\
            <div class="title" style="font-family: '+fontfamely+'; font-style: '+style+';">\
                <h1>(H1) Первый новый год</h1>\
                <h2>(H2) Первый новый год</h2>\
                <h3>(H3) Первый новый год</h3>\
                <h4>(H4) Первый новый год</h4>\
                <h5>(H5) Первый новый год</h5>\
                <h6>(H6) Первый новый год</h6>\
            </div>\
            <div class="txt" style="font-family: '+fontfamely+'; font-weight: '+weight+'; font-style: '+style+';">\
                <div class="font">\
                    <span>'+size+'px</span>\
                    <p style="font-size: '+size+'px;">Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</p>\
                    <p style="font-size: '+size+'px;">АБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЪЭЮЯ</p>\
                    <p style="font-size: '+size+'px;">абвгдежзийклмнопрстуфхцчшщьъэюя</p>\
                </div>\
                <div class="font">\
                    <span>'+size1+'px</span>\
                    <p style="font-size: '+size1+'px;">Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</p>\
                    <p style="font-size: '+size1+'px;">АБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЪЭЮЯ</p>\
                    <p style="font-size: '+size1+'px;">абвгдежзийклмнопрстуфхцчшщьъэюя</p>\
                </div>\
                <div class="font">\
                    <span>'+size2+'px</span>\
                    <p style="font-size: '+size2+'px;">Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</p>\
                    <p style="font-size: '+size2+'px;">АБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЪЭЮЯ</p>\
                    <p style="font-size: '+size2+'px;">абвгдежзийклмнопрстуфхцчшщьъэюя</p>\
                </div>\
                <div class="font">\
                    <span>'+size3+'px</span>\
                    <p style="font-size: '+size3+'px;">Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</p>\
                    <p style="font-size: '+size3+'px;">АБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЪЭЮЯ</p>\
                    <p style="font-size: '+size3+'px;">абвгдежзийклмнопрстуфхцчшщьъэюя</p>\
                </div>\
            </div>\
        </div>\
        ';

        var btn = $('.btn-block').html();

        if(counter != 1){
            $('.text').removeClass("col-md-6").addClass('col-md-4');
            $('.new').removeClass("col-md-6").addClass('col-md-4');
            $('<div/>').addClass('col-md-4').html(text).appendTo('.test');
            $('.btn-block').removeClass("col-md-6").addClass('col-md-4');
            $('.btn-block .col-md-6').removeClass("col-md-6").addClass('btn-fix col-md-4');
            $('.btn-block .search').removeClass("col-md-4").addClass('col-md-6');
        }else {
            $('.text').removeClass("col-md-12").addClass('col-md-6');
            $('<div/>').addClass('new col-md-6').html(text).appendTo('.test');
            $('.btn-block').addClass('col-md-6');
            $('.btn-block .col-md-4').removeClass("col-md-4").addClass('col-md-6');
            $('.btn-block .col-md-3').removeClass("col-md-3").addClass('search col-md-4');
        }
        e.stopPropagation();
    });
    // var fs = require('fs');
    //
    // fs.readFile('less-1.3.3.min.js', {encoding: 'utf8'}, function (err, data) {
    //     if (err) throw err;
    //     console.log(data);
    // });

});
