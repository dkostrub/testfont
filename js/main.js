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
        fontfamely = font.replace(/\s/gi, "");
        var font2 = font.replace(/([\-\_])/i, " ");

        var size1, size2, size3;
        size1 = size-2;
        size2 = size-4;
        size3 = Math.ceil(size/2);

        var cloneText = $('.cloneText').clone().removeClass('cloneText').css('display', '').data('id', counter).attr('data-id', counter);
        cloneText.prepend('<style type="text/css">\
            @font-face {\n\
                font-family:' +font+';\n\
                src: local("'+font+'"),\n\
                local("'+font2+'");\n\
                src: url("/fonts/'+font_url+'.eot");\n\
                src: url("/fonts/'+font_url+'.eot#iefix") format("embedded-opentype"),\n\
                url("/fonts/'+font_url+'.woff") format("woff"),\n\
                url("/fonts/'+font_url+'.ttf") format("truetype"),\n\
                url("/fonts/'+font_url+'.svg") format("svg");\n\
                font-weight: normal;\n\
                font-style: normal;\n\
            }\
            </style>');
        cloneText.children('.form-font').children('.style').data('object', counter).attr('data-object', counter);
        cloneText.children('.form-font').children('.weight').data('object', counter).attr('data-object', counter);
        cloneText.children('.form-font').children('.font').text(font);
        cloneText.children('.form-font').children('.style').find('.selectedStyle').text(style);
        cloneText.children('.form-font').children('.weight').find('.selectedWeight').text(weight);
        cloneText.children('.txt').data('.textId', counter).attr('data-text-id', counter);
        cloneText.children('.title').data('.titleId', counter).attr('data-title-id', counter);
        cloneText.find('.title').css({'font-family': fontfamely, 'font-style': style});
        cloneText.find('.txt').css({'font-family': fontfamely, 'font-weight': weight, 'font-style': style});
        cloneText.find('.btn').css('font-family', fontfamely);
        cloneText.find('.form_block__input > input').css('font-family', fontfamely);
        cloneText.children('.txt').children('.font[id="1"]').find('span').html('<strong>'+size+'px</strong>');
        cloneText.children('.txt').children('.font[id="2"]').find('span').html('<strong>'+size1+'px</strong>');
        cloneText.children('.txt').children('.font[id="3"]').find('span').html('<strong>'+size2+'px</strong>');
        cloneText.children('.txt').children('.font[id="4"]').find('span').html('<strong>'+size3+'px</strong>');
        cloneText.children('.txt').children('.font[id="1"]').find('p').css('font-size', size+'px');
        cloneText.children('.txt').children('.font[id="2"]').find('p').css('font-size', size1+'px');
        cloneText.children('.txt').children('.font[id="3"]').find('p').css('font-size', size2+'px');
        cloneText.children('.txt').children('.font[id="4"]').find('p').css('font-size', size3+'px');

        if(counter > 1){
            if(counter > 1 && $('.text').length == 1){
                $('.text').removeClass('col-md-12').addClass('col-md-6');
                cloneText.addClass('text col-md-6').appendTo('.test');
            }else {
                $('.text').removeClass('col-md-6').addClass('col-md-4');
                cloneText.addClass('text col-md-4').appendTo('.test');
                $('.remove').css('display', 'none');
            }
            $('.btn-block .col-md-4').removeClass("col-md-4").addClass('col-md-6');
            $('.btn-block .col-md-3').removeClass("col-md-3").addClass('search col-md-6');
        }else {
            $('.text').removeClass('col-md-12').addClass('col-md-6');
            cloneText.addClass('text col-md-6').appendTo('.test');
        }

        if($('.text').length > 1) {
            $('.remove').css('display', '');
        }

        weightInizialize();
        styleInizialize();

        $("#status").load("action.php","fontfamily="+font);

        e.stopPropagation();
    });

    function weightInizialize() {
        $(this).on('click', function() {
            $('.weight').children('ul').stop().slideUp();
        });

        $('.weight').off().on('click', function(e) {
            e.stopPropagation();
            $(this).children('ul').stop().slideToggle();
            $('.style').children('ul').slideUp();
        });

        $('.weight li').off().on('click', function(e) {
            e.stopPropagation();
            var context = $(this).parents('.weight');
            var weight = $(this).data('weight');
            var idForm = context.data('object');
            var idBlock = $(this).parents('.text').data('id');

            if(idBlock == idForm){
                $(this).parents('.text').children('.txt').css('font-weight', weight);
                context.children('.selectedWeight').text(weight);
            }

            $('.weight').children('ul').slideUp();
        })
    }
    weightInizialize();

    function styleInizialize() {
        $(this).on('click', function() {
            $('.style').children('ul').stop().slideUp();
        });

        $('.style').off().on('click', function(e) {
            e.stopPropagation();
            $(this).children('ul').stop().slideToggle();
            $('.weight').children('ul').slideUp();
        });

        $('.style li').off().on('click', function(e) {
            e.stopPropagation();
            var context = $(this).parents('.style');
            var style = $(this).data('style');
            var idForm = context.data('object');
            var idBlock = $(this).parents('.text').data('id');

            if(idBlock == idForm) {
                $(this).parents('.text').children('.txt').css('font-style', style);
                $(this).parents('.text').children('.title').css('font-style', style);
                context.children('.selectedStyle').text(style);
            }

            $('.style').children('ul').slideUp();
        })
    }
    styleInizialize();

    /////////Удаление блоков
    $('html').on('click','.remove', function () {
        $(this).parent().parent().remove();
        if($('.text').length < 3 && $('.text').length != 1){
            $('.text').removeClass('col-md-4').addClass('col-md-6');
        }
        if($('.text').length == 1 || $('.text').length == 0){
            $('.text').removeClass('col-md-6').addClass('col-md-12');
            $('.remove').css('display', 'none');
            $('.btn-block .col-md-6').removeClass("col-md-6").addClass('col-md-4');
            $('.btn-block .search').removeClass("col-md-4").addClass('col-md-3');
        }
    });

    // $('.font-form').on('click', function(e){
    //     e.preventDefault();
        // var data = $('.font-form').serializeArray();
        // var data = $(this),
        //     fData = data.serialize();
        // $.ajax({
        //     url: data.attr('action'), // путь к обработчику берем из атрибута action
        //     type: data.attr('method'), // метод передачи - берем из атрибута method
        //     data: {form_data: fData},
        //     dataType: 'json',
        //     success: function(json){
        //         // В случае успешного завершения запроса...
        //         if(json){
        //             data.replaceWith(json); // заменим форму данными, полученными в ответе.
        //         }
        //     }
        // });
    // });

});