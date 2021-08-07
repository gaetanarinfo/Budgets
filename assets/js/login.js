$('#login').submit(function() {

    $.ajax({
        url: "../ajax/ajax-connexion.php",
        type: "POST",
        data: {
            username: $('#username').val(),
            password: $('#password').val(),
        },
        cache: false,
        success: function(data) {

            if (data == "ok") {

                $('.toast').addClass('bg-success');
                $('.toast').removeClass('bg-danger');

                $('.toast_message').html('<i class="fas fa-check me-1"></i> Connexion réussi !')
                $('.toast').fadeIn();

                setTimeout(() => {
                    location.href = "/";
                }, 1500);
            } else if (data == "error_login") {

                $('.toast').removeClass('bg-success');
                $('.toast').addClass('bg-danger');

                $('.toast_message').html('<i class="fas fa-times me-1"></i> Identifiant ou mot de passe incorrect !')
                $('.toast').fadeIn();

                setTimeout(() => {
                    $('.toast').fadeOut();
                }, 1500);

            } else if (data = "error_status") {
                $('.toast').removeClass('bg-success');
                $('.toast').addClass('bg-danger');

                $('.toast_message').html('<i class="fas fa-times me-1"></i> Votre compte doit être validé !')
                $('.toast').fadeIn();

                setTimeout(() => {
                    $('.toast').fadeOut();
                }, 1500);
            }


        }

    });

    return false;

});

function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = encodeURIComponent(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ')
            c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0)
            return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}


$('#remember_me').click(function() {
    if ($(this).prop("checked") == true) {

        localStorage.setItem('username', $('#username').val());
        localStorage.setItem('password', $('#password').val());

    } else if ($(this).prop("checked") == false) {

        localStorage.removeItem('username');
        localStorage.removeItem('password');
        $('#remember_me').prop('checked', false);

    }
});

$('#username').val(localStorage.getItem('username'));
$('#password').val(localStorage.getItem('password'));

if (localStorage.getItem('username') != undefined) {
    $('#remember_me').prop('checked', true);
}