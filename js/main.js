$(document).ready(function() {
    var counter = 0;
    $('body').on('click', '.add-text', function (e) {
        var font, size, weight, style;

        var str = $("form").serializeArray();
        font = str[0].value;
        size = str[1].value;
        weight = str[2].value;
        style = str[3].value;

        var size1, size2, sizze3;
        size1 = size-2;
        size2 = size-4;
        size3 = Math.ceil(size/2);



        counter++;
        if(counter != 1){
            $('.text').removeClass("col-md-6").addClass('col-md-4');
            $('.new').removeClass("col-md-6").addClass('col-md-4');
            $('<div/>').addClass('col-md-4').html('<div style="font-size:' + size + 'px'+';" >CREATE TEXT</div>').appendTo('.test');
        }else {
            $('.text').removeClass("col-md-12").addClass('col-md-6');
            $('<div/>').addClass('new col-md-6').html('<div style="font-size:' + size + 'px'+';" >CREATE TEXT</div>').appendTo('.test');
            $('.btn-block').addClass('col-md-6');
            $('.btn-block .col-md-4').removeClass("col-md-4").addClass('col-md-6');
            $('.btn-block .col-md-3').removeClass("col-md-3").addClass('col-md-4');
        }
        e.stopPropagation();
    });
});