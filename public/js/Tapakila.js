// menu categoeris pull-----------------------
$(function() {
    var pull = $('#pull');
    menu = $('#sectioncategorie ul');
    menuHeight = menu.height();

    $(pull).on('click', function(e) {
        e.preventDefault();
        menu.slideToggle();
    });

    $(window).resize(function() {
        var w = $(window).width();
        if (w > 320 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });
});

$('.dropdown-menu ul li a').click(function(event) {
    event.stopPropagation();
    $(this).parent().toggleClass('active').siblings().removeClass('active');
    var target = $(this).attr('href');
    $('ul li .tab-content ' + target).toggleClass(active);
});


// colortextcalendar cart-------------------------------

function mouseover(id, idtext) {
    $('#' + id + '').css('background', '#d70506');
    $('#' + idtext + '').css('color', '#d70506');
}

function mouseleave(id, idtext) {
    $('#' + id + '').css('background', '#5cb85c');
    $('#' + idtext + '').css('color', '#333');
}

// updowndetails---------------------------------------

$(document).ready(function() {
    $('#total1').html('0');
});
var newticket = 20;
$(document).on('click', '.number-spinner button', function() {
    var btn = $(this),
        oldValue = btn.closest('.number-spinner').find('input').val().trim(),
        newVal = 0;
    if (btn.attr('data-dir') == 'up') {
        if (oldValue < 20) {
            newVal = parseInt(oldValue) + 1;
            var prixUnit1 = 4000 * newVal;
            newticket -= 1;
            $('#tickets1').html(newticket);
            $('#prixUnit1').html(0 + prixUnit1);

            btn.closest('.number-spinner').find('input').val(newVal);
            var total = parseInt($('#prixUnit1').html()) + parseInt($('#prixUnit2').html());
            $('#total1').html(total);
        } else if (oldValue == 20) {
            $('#tickets1').html('Epuisé');
            $('.clock i').removeClass('fa-unlock');
            $('.clock i').addClass('fa-lock');
            $('#btn-up').attr('disabled', 'true');
            var total = parseInt($('#prixUnit1').html()) + parseInt($('#prixUnit2').html());
            $('#total1').html(total);
        }

    } else {
        if (oldValue > 0) {
            newVal = parseInt(oldValue) - 1;
            var prixUnit1 = 4000 * newVal;
            newticket += 1;
            $('#prixUnit1').html(0 + prixUnit1);
            $('#tickets1').html(newticket);
            $('#btn-up').removeAttr('disabled');
            $('.clock i').removeClass('fa-lock');
            $('.clock i').addClass('fa-unlock');
            btn.closest('.number-spinner').find('input').val(newVal);
            var total = parseInt($('#prixUnit1').html()) + parseInt($('#prixUnit2').html());
            $('#total1').html(total);
        }
    }
});

var newtickets = 20;
$(document).on('click', '.number-spinner2 button', function() {
    var total = parseInt($('#prixUnit1').html()) + parseInt($('#prixUnit2').html());
    var btn = $(this),
        oldValue = btn.closest('.number-spinner2').find('input').val().trim(),
        newVal = 0;

    if (btn.attr('data-dir') == 'up') {
        if (oldValue < 20) {
            newVal = parseInt(oldValue) + 1;
            var prixUnit1 = 4000 * newVal;
            newtickets -= 1;
            $('#prixUnit2').html(0 + prixUnit1);
            $('#tickets2').html(newtickets);
            btn.closest('.number-spinner2').find('input').val(newVal);
            var total = parseInt($('#prixUnit1').html()) + parseInt($('#prixUnit2').html());
            $('#total1').html(total);
        } else if (oldValue == 20) {
            $('#tickets2').html('Epuisé');
            $('.unlock i').removeClass('fa-unlock');
            $('.unlock i').addClass('fa-lock');
            $('#btn-up2').attr('disabled', 'true');
            var total = parseInt($('#prixUnit1').html()) + parseInt($('#prixUnit2').html());
            $('#total1').html(total);
        }

    } else {
        if (oldValue > 0) {
            newVal = parseInt(oldValue) - 1;
            var prixUnit1 = 4000 * newVal;
            newtickets += 1;
            $('#prixUnit2').html(0 + prixUnit1);
            $('#tickets2').html(newtickets);
            $('#btn-up2').removeAttr('disabled');
            $('.unlock i').removeClass('fa-lock');
            $('.unlock i').addClass('fa-unlock');
            btn.closest('.number-spinner2').find('input').val(newVal);
            var total = parseInt($('#prixUnit1').html()) + parseInt($('#prixUnit2').html());
            $('#total1').html(total);
        }
    }
});

$(document).ready(function() {
    $('#total2').html('0');
});
var newticket1 = 20;
$(document).on('click', '.number-spinner3 button', function() {
    var btn = $(this),
        oldValue = btn.closest('.number-spinner3').find('input').val().trim(),
        newVal = 0;
    if (btn.attr('data-dir') == 'up') {
        if (oldValue < 20) {
            newVal = parseInt(oldValue) + 1;
            var prixUnit3 = 4000 * newVal;
            newticket1 -= 1;
            $('#tickets3').html(newticket1);
            $('#prixUnit3').html(0 + prixUnit3);

            btn.closest('.number-spinner3').find('input').val(newVal);
            var total = parseInt($('#prixUnit3').html()) + parseInt($('#prixUnit4').html());
            $('#total2').html(total);
        } else if (oldValue == 20) {
            $('#tickets3').html('Epuisé');
            $('.clock i').removeClass('fa-unlock');
            $('.clock i').addClass('fa-lock');
            $('#btn-up3').attr('disabled', 'true');
            var total = parseInt($('#prixUnit3').html()) + parseInt($('#prixUnit4').html());
            $('#total2').html(total);
        }

    } else {
        if (oldValue > 0) {
            newVal = parseInt(oldValue) - 1;
            var prixUnit3 = 4000 * newVal;
            newticket1 += 1;
            $('#prixUnit3').html(0 + prixUnit3);
            $('#tickets3').html(newticket1);
            $('#btn-up3').removeAttr('disabled');
            $('.clock i').removeClass('fa-lock');
            $('.clock i').addClass('fa-unlock');
            btn.closest('.number-spinner3').find('input').val(newVal);
            var total = parseInt($('#prixUnit3').html()) + parseInt($('#prixUnit4').html());
            $('#total2').html(total);
        }
    }
});

var newtickets2 = 20;
$(document).on('click', '.number-spinner4 button', function() {
    var total = parseInt($('#prixUnit3').html()) + parseInt($('#prixUnit4').html());
    var btn = $(this),
        oldValue = btn.closest('.number-spinner4').find('input').val().trim(),
        newVal = 0;

    if (btn.attr('data-dir') == 'up') {
        if (oldValue < 20) {
            newVal = parseInt(oldValue) + 1;
            var prixUnit4 = 4000 * newVal;
            newtickets2 -= 1;
            $('#prixUnit4').html(0 + prixUnit4);
            $('#tickets4').html(newtickets2);
            btn.closest('.number-spinner4').find('input').val(newVal);
            var total = parseInt($('#prixUnit3').html()) + parseInt($('#prixUnit4').html());
            $('#total2').html(total);
        } else if (oldValue == 20) {
            $('#tickets4').html('Epuisé');
            $('.unlock i').removeClass('fa-unlock');
            $('.unlock i').addClass('fa-lock');
            $('#btn-up4').attr('disabled', 'true');
            var total = parseInt($('#prixUnit3').html()) + parseInt($('#prixUnit4').html());
            $('#total2').html(total);
        }

    } else {
        if (oldValue > 0) {
            newVal = parseInt(oldValue) - 1;
            var prixUnit4 = 4000 * newVal;
            newtickets2 += 1;
            $('#prixUnit4').html(0 + prixUnit4);
            $('#tickets4').html(newtickets2);
            $('#btn-up4').removeAttr('disabled');
            $('.unlock i').removeClass('fa-lock');
            $('.unlock i').addClass('fa-unlock');
            btn.closest('.number-spinner4').find('input').val(newVal);
            var total = parseInt($('#prixUnit3').html()) + parseInt($('#prixUnit4').html());
            $('#total2').html(total);
        }
    }
});

$(document).ready(function() {
    $('#total3').html('0');
});
var newticket4 = 20;
$(document).on('click', '.number-spinner5 button', function() {
    var btn = $(this),
        oldValue = btn.closest('.number-spinner5').find('input').val().trim(),
        newVal = 0;
    if (btn.attr('data-dir') == 'up') {
        if (oldValue < 20) {
            newVal = parseInt(oldValue) + 1;
            var prixUnit5 = 4000 * newVal;
            newticket4 -= 1;
            $('#tickets5').html(newticket4);
            $('#prixUnit5').html(0 + prixUnit5);

            btn.closest('.number-spinner5').find('input').val(newVal);
            var total = parseInt($('#prixUnit5').html()) + parseInt($('#prixUnit6').html());
            $('#total3').html(total);
        } else if (oldValue == 20) {
            $('#tickets5').html('Epuisé');
            $('.clock i').removeClass('fa-unlock');
            $('.clock i').addClass('fa-lock');
            $('#btn-up5').attr('disabled', 'true');
            var total = parseInt($('#prixUnit5').html()) + parseInt($('#prixUnit6').html());
            $('#total3').html(total);
        }

    } else {
        if (oldValue > 0) {
            newVal = parseInt(oldValue) - 1;
            var prixUnit5 = 4000 * newVal;
            newticket4 += 1;
            $('#prixUnit5').html(0 + prixUnit5);
            $('#tickets5').html(newticket4);
            $('#btn-up5').removeAttr('disabled');
            $('.clock i').removeClass('fa-lock');
            $('.clock i').addClass('fa-unlock');
            btn.closest('.number-spinner5').find('input').val(newVal);
            var total = parseInt($('#prixUnit5').html()) + parseInt($('#prixUnit6').html());
            $('#total3').html(total);
        }
    }
});

var newtickets5 = 20;
$(document).on('click', '.number-spinner6 button', function() {
    var total = parseInt($('#prixUnit5').html()) + parseInt($('#prixUnit6').html());
    var btn = $(this),
        oldValue = btn.closest('.number-spinner6').find('input').val().trim(),
        newVal = 0;

    if (btn.attr('data-dir') == 'up') {
        if (oldValue < 20) {
            newVal = parseInt(oldValue) + 1;
            var prixUnit6 = 4000 * newVal;
            newtickets5 -= 1;
            $('#prixUnit6').html(0 + prixUnit6);
            $('#tickets6').html(newtickets5);
            btn.closest('.number-spinner6').find('input').val(newVal);
            var total = parseInt($('#prixUnit5').html()) + parseInt($('#prixUnit6').html());
            $('#total3').html(total);
        } else if (oldValue == 20) {
            $('#tickets6').html('Epuisé');
            $('.unlock i').removeClass('fa-unlock');
            $('.unlock i').addClass('fa-lock');
            $('#btn-up6').attr('disabled', 'true');
            var total = parseInt($('#prixUnit5').html()) + parseInt($('#prixUnit6').html());
            $('#total3').html(total);
        }

    } else {
        if (oldValue > 0) {
            newVal = parseInt(oldValue) - 1;
            var prixUnit6 = 4000 * newVal;
            newtickets5 += 1;
            $('#prixUnit6').html(0 + prixUnit6);
            $('#tickets6').html(newtickets5);
            $('#btn-up6').removeAttr('disabled');
            $('.unlock i').removeClass('fa-lock');
            $('.unlock i').addClass('fa-unlock');
            btn.closest('.number-spinner6').find('input').val(newVal);
            var total = parseInt($('#prixUnit5').html()) + parseInt($('#prixUnit6').html());
            $('#total3').html(total);
        }
    }
});

<!-- calcul up down 1 start -->
$(document).ready(function() {
    $('#total4').html('0');
});
var newticket6 = 20;
$(document).on('click', '.number-spinner7 button', function() {
    var btn = $(this),
        oldValue = btn.closest('.number-spinner7').find('input').val().trim(),
        newVal = 0;
    if (btn.attr('data-dir') == 'up') {
        if (oldValue < 20) {
            newVal = parseInt(oldValue) + 1;
            var prixUnit7 = 4000 * newVal;
            newticket6 -= 1;
            $('#tickets7').html(newticket6);
            $('#prixUnit7').html(0 + prixUnit7);

            btn.closest('.number-spinner7').find('input').val(newVal);
            var total = parseInt($('#prixUnit7').html()) + parseInt($('#prixUnit8').html());
            $('#total3').html(total);
        } else if (oldValue == 20) {
            $('#tickets7').html('Epuisé');
            $('.clock i').removeClass('fa-unlock');
            $('.clock i').addClass('fa-lock');
            $('#btn-up7').attr('disabled', 'true');
            var total = parseInt($('#prixUnit7').html()) + parseInt($('#prixUnit8').html());
            $('#total4').html(total);
        }

    } else {
        if (oldValue > 0) {
            newVal = parseInt(oldValue) - 1;
            var prixUnit7 = 4000 * newVal;
            newticket6 += 1;
            $('#prixUnit7').html(0 + prixUnit7);
            $('#tickets7').html(newticket6);
            $('#btn-up5').removeAttr('disabled');
            $('.clock i').removeClass('fa-lock');
            $('.clock i').addClass('fa-unlock');
            btn.closest('.number-spinner7').find('input').val(newVal);
            var total = parseInt($('#prixUnit7').html()) + parseInt($('#prixUnit8').html());
            $('#total4').html(total);
        }
    }
});

var newtickets7 = 20;
$(document).on('click', '.number-spinner8 button', function() {
    var total = parseInt($('#prixUnit7').html()) + parseInt($('#prixUnit8').html());
    var btn = $(this),
        oldValue = btn.closest('.number-spinner8').find('input').val().trim(),
        newVal = 0;

    if (btn.attr('data-dir') == 'up') {
        if (oldValue < 20) {
            newVal = parseInt(oldValue) + 1;
            var prixUnit8 = 4000 * newVal;
            newtickets7 -= 1;
            $('#prixUnit8').html(0 + prixUnit8);
            $('#tickets8').html(newtickets7);
            btn.closest('.number-spinner8').find('input').val(newVal);
            var total = parseInt($('#prixUnit7').html()) + parseInt($('#prixUnit8').html());
            $('#total4').html(total);
        } else if (oldValue == 20) {
            $('#tickets8').html('Epuisé');
            $('.unlock i').removeClass('fa-unlock');
            $('.unlock i').addClass('fa-lock');
            $('#btn-up8').attr('disabled', 'true');
            var total = parseInt($('#prixUnit7').html()) + parseInt($('#prixUnit8').html());
            $('#total4').html(total);
        }

    } else {
        if (oldValue > 0) {
            newVal = parseInt(oldValue) - 1;
            var prixUnit8 = 4000 * newVal;
            newtickets7 += 1;
            $('#prixUnit8').html(0 + prixUnit8);
            $('#tickets8').html(newtickets7);
            $('#btn-up8').removeAttr('disabled');
            $('.unlock i').removeClass('fa-lock');
            $('.unlock i').addClass('fa-unlock');
            btn.closest('.number-spinner8').find('input').val(newVal);
            var total = parseInt($('#prixUnit7').html()) + parseInt($('#prixUnit8').html());
            $('#total4').html(total);
        }
    }
});

$(".nav-tabs").find("li a").last().click();

var url = document.URL;
var hash = url.substring(url.indexOf('#'));

$(".nav-tabs").find("li a").each(function(key, val) {

    if (hash == $(val).attr('href')) {

        $(val).click();

    }
    $(val).click(function(ky, vl) {

        console.log($(this).attr('href'));
        location.hash = $(this).attr('href');
    });

});

// toplite--------------------
$(function() {
    $('a[title]').tooltip();
});

// pagechangecheckout--------------------------

function changePage(idNow, idNext) {
    //li reto
    $('#li_' + idNext).removeClass('disabled');
    $('#li_' + idNext).addClass('active');
    $('#li_' + idNow).removeClass('active');
    //$('#li_'+idNow).addClass('disabled');
    //contenu
    $('#' + idNext).addClass('in active');
    $('#' + idNow).removeClass('in active');
}

function changePageLi(name) {
    if (document.getElementById("li_" + name).className != "disabled") {
        $('#li_home').removeClass('active');
        $('#li_profile').removeClass('active');
        $('#li_messages').removeClass('active');
        $('#li_settings').removeClass('active');
        $('#li_doner').removeClass('active');

        $('#home').removeClass('active');
        $('#profile').removeClass('active');
        $('#messages').removeClass('active');
        $('#settings').removeClass('active');
        $('#doner').removeClass('active');

        $('#li_' + name).addClass('active');
        $('#' + name).addClass('in active');
    }
}

// page connexion----------------------------------

$(function() {

    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

});

// moncompte---------------------
function changePage(id, aId) {
    document.getElementById("div_compte").className = "hide";
    document.getElementById("div_commandes").className = "hide";
    document.getElementById("div_ev").className = "hide";
    document.getElementById("div_news").className = "hide";
    document.getElementById(id).className = "show";

    document.getElementById("a_compte").className = "";
    document.getElementById("a_commandes").className = "";
    document.getElementById("a_ev").className = "";
    document.getElementById("a_news").className = "";
    document.getElementById(aId).className = "activeee";
}