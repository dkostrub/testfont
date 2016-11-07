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

        var cloneText = $('.cloneText').clone().removeClass('cloneText').css('display', '').data('id', counter).attr('data-id', counter);
        cloneText.children('.form-font').children('.style').data('object', counter).attr('data-object', counter);
        cloneText.children('.form-font').children('.weight').data('object', counter).attr('data-object', counter);
        cloneText.children('.txt').data('.textId', counter).attr('data-text-id', counter);
        cloneText.children('.title').data('.titleId', counter).attr('data-title-id', counter);

        if(counter > 1){
            if(counter > 1 && $('.text').length == 1){
                $('.text').removeClass('col-md-12').addClass('col-md-6');
                cloneText.addClass('text col-md-6').appendTo('.test');
            }else {
                $('.text').removeClass('col-md-6').addClass('col-md-4');
                cloneText.addClass('text col-md-4').appendTo('.test');
            }
            $('.btn-block .col-md-4').removeClass("col-md-4").addClass('col-md-6');
            $('.btn-block .col-md-3').removeClass("col-md-3").addClass('col-md-6');
        }else {
            $('.text').removeClass('col-md-12').addClass('col-md-6');
            cloneText.addClass('text col-md-6').appendTo('.test');
        }
        weightInizialize();
        styleInizialize();
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
        if($('.text').length == 1){
            $('.text').removeClass('col-md-6').addClass('col-md-12')
        }
    });
});
