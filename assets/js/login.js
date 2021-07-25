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

            }


        }

    });

    return false;

});