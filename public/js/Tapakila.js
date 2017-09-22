$(document).ready(function () {
    $('#grand_total').html('0');
    console.log('ready');
});
$(function () {
    var nombre_id = $('#nombre_id').val();
    for (var i = 0; i < nombre_id; i++) {
        $('#btn-up' + i).on('click', function () {
            var number_ticket = parseInt($('#tickets' + i).html());
            var newVal = number_ticket + 1;
            if (newVal > number_ticket) {
                alert('depassé');
            }
        });
        $('#btn-up' + i).on('click', function () {
            var number_ticket = parseInt($('#tickets' + i).html());
            var newVal = number_ticket - 1;
            $('#tickets' + i).html(newVal);
            if (number_ticket == 0) {
                alert('lany');
            }
        });
    }
});