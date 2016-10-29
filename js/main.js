$(document).ready(function() {
// $('.add-upd').click(function(){
//
//     $('.content').append("HTML TEXT");
// });

    var counter = 1;
    $('body').on('click', '.add-text', function (e) {
        $('<div/>').text(counter++).appendTo(this);
        e.stopPropagation();
    });

});