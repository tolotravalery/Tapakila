$(document).ready(function () {
    console.log('start');
    $('#grand_total').html('0');


    /*var newtickets = 250;
     $(document).on('click', '.number-spinner1 button', function () {
     console.log('spinner 1');
     var total = parseInt($('#prixUnit0').html()) + parseInt($('#prixUnit1').html());
     var btn = $(this),
     oldValue = btn.closest('.number-spinner1').find('input').val().trim(),
     newVal = 0;

     if (btn.attr('data-dir') == 'up') {
     if (oldValue < 250) {
     newVal = parseInt(oldValue) + 1;
     var prixUnit1 = 4000 * newVal;
     newtickets -= 1;
     $('#prixUnit1').html(0 + prixUnit1);
     $('#tickets1').html(newtickets);
     btn.closest('.number-spinner1').find('input').val(newVal);
     var total = parseInt($('#prixUnit0').html()) + parseInt($('#prixUnit1').html());
     $('#total1').html(total);
     } else if (oldValue == 250) {
     $('#tickets1').html('Epuisé');
     $('.unlock counter').removeClass('fa-unlock');
     $('.unlock counter').addClass('fa-lock');
     $('#btn-up1').attr('disabled', 'true');
     var total = parseInt($('#prixUnit0').html()) + parseInt($('#prixUnit1').html());
     $('#total1').html(total);
     }

     } else {
     if (oldValue > 0) {
     newVal = parseInt(oldValue) - 1;
     var prixUnit1 = 4000 * newVal;
     newtickets += 1;
     $('#prixUnit1').html(0 + prixUnit1);
     $('#tickets1').html(newtickets);
     $('#btn-up1').removeAttr('disabled');
     $('.unlock counter').removeClass('fa-lock');
     $('.unlock counter').addClass('fa-unlock');
     btn.closest('.number-spinner1').find('input').val(newVal);
     var total = parseInt($('#prixUnit0').html()) + parseInt($('#prixUnit1').html());
     $('#total1').html(total);
     }
     }
     });*/
});
function loadEvent() {
    // console.log('counter', counter);
    var newticket = 20;
    var nombre_id = $('#nombre_id').val();
    for (var counter = 0; counter < nombre_id;) {
        $(document).on('click', '.number-spinner' + counter + ' button', function () {
            console.log('counter', counter);
            console.log('spinner ' + counter);
            var btn = $(this),
                oldValue = btn.closest('.number-spinner' + counter).find('input').val().trim(),
                newVal = 0;
            if (btn.attr('data-dir') == 'up') {
                if (oldValue < 20) {
                    newVal = parseInt(oldValue) + 1;
                    var prixUnit1 = 4000 * newVal;
                    newticket -= 1;
                    $('#tickets' + counter).html(newticket);
                    $('#prixUnit' + counter).html(0 + prixUnit1);

                    btn.closest('.number-spinner' + counter).find('input').val(newVal);
                    var total = parseInt($('#prixUnit' + counter).html()) + parseInt($('#prixUnit1').html());
                    $('#total' + counter).html(total);
                } else if (oldValue == 20) {
                    $('#tickets' + counter).html('Epuisé');
                    $('.clock counter').removeClass('fa-unlock');
                    $('.clock counter').addClass('fa-lock');
                    $('#btn-up0').attr('disabled', 'true');
                    var total = parseInt($('#prixUnit' + counter).html()) + parseInt($('#prixUnit1').html());
                    $('#total' + counter).html(total);
                }

            } else {
                if (oldValue > 0) {
                    newVal = parseInt(oldValue) - 1;
                    var prixUnit1 = 4000 * newVal;
                    newticket += 1;
                    $('#prixUnit' + counter).html(0 + prixUnit1);
                    $('#tickets' + counter).html(newticket);
                    $('#btn-up').removeAttr('disabled');
                    $('.clock counter').removeClass('fa-lock');
                    $('.clock counter').addClass('fa-unlock');
                    btn.closest('.number-spinner' + counter).find('input').val(newVal);
                    var total = parseInt($('#prixUnit' + counter).html()) + parseInt($('#prixUnit1').html());
                    $('#total' + counter).html(total);
                }
            }
        });
    }
}
