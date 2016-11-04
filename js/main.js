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
        var cloneText = $('.cloneText').clone().css('display', '');

        var formFontStyle = $('.style');
        var formFontWeight = $('.weight');
        console.log(formFontStyle);
        if(counter > 1){
            $('.text').removeClass('col-md-6').addClass('col-md-4');
            cloneText.removeClass('cloneText').addClass('text col-md-4').data('id', counter).attr('data-id', counter).appendTo('.test');
            // $('.btn-block').removeClass("col-md-6").addClass('col-md-4');
            // $('.btn-block .col-md-6').removeClass("col-md-6").addClass('btn-fix col-md-4');
            // $('.btn-block .search').removeClass("col-md-4").addClass('col-md-6');
        }else {
            $('.text').removeClass('col-md-12').addClass('col-md-6');
            cloneText.removeClass('cloneText').addClass('text col-md-6').data('id', counter).attr('data-id', counter).appendTo('.test');
            // $('.btn-block').addClass('col-md-6');
            // $('.btn-block .col-md-4').removeClass("col-md-4").addClass('col-md-6');
            // $('.btn-block .col-md-3').removeClass("col-md-3").addClass('search col-md-4');
        }
        e.stopPropagation();
    });

    function weightInizialize() {
        $(this).on('click', function() {
            $('.weight').children('ul').stop().slideUp();
        });

        $('.weight').off().on('click', function(e) {
            e.stopPropagation();
            $(this).children('ul').stop().slideToggle();
            $('.style').children('ul').slideUp()
        });

        $('.weight li').off().on('click', function(e) {
            e.stopPropagation();
            var context = $(this).parents('.weight');
            var weight = $(this).data('weight');
            var target = context.data('object');
            var idBlock = $('.text').data('id');


            $('.txt').css('font-weight', weight);
            $('.selectedWeight').text(weight);


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
            // var context = $(this).parents('.style');
            var style = $(this).data('style');
            // var target = context.data('object');
            // var idBlock = $(this).parents('.text');
            $('.txt').css('font-style', style);
            $('.title').css('font-style', style);
            $('.selectedStyle').text(style);
            $('.style').children('ul').slideUp();
        })
    }
    styleInizialize();

});
