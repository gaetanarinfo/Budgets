$('#register').submit(function() {

    if ($('#username').val().length < 3) {

        $('.toast').removeClass('bg-success');
        $('.toast').addClass('bg-danger');

        $('.toast_message').html('<i class="fas fa-check me-1"></i> Ce nom d\'utilisateur et trop petit !')
        $('.toast').fadeIn();

        setTimeout(() => {
            $('.toast').fadeOut();
        }, 1500);

    } else if ($('#password').val().length < 7) {

        $('.toast_message').html('<i class="fas fa-check me-1"></i> Ce mot de passe et trop petit !')
        $('.toast').fadeIn();

        $('.toast').removeClass('bg-success');
        $('.toast').addClass('bg-danger');

        setTimeout(() => {
            $('.toast').fadeOut();
        }, 1500);

    } else {

        $.ajax({
            url: "../ajax/ajax-register.php",
            type: "POST",
            data: {
                username: $('#username').val(),
                password: $('#password').val(),
                email: $('#email').val()
            },
            cache: false,
            success: function(data) {

                if (data == "ok") {

                    $('.toast').removeClass('bg-danger');
                    $('.toast').addClass('bg-success');

                    $('.toast_message').html('<i class="fas fa-check me-1"></i> Inscription réussi !')
                    $('.toast').fadeIn();

                    setTimeout(() => {
                        location.href = 'login';
                    }, 1500);
                } else if (data == "error_register") {

                    $('.toast').removeClass('bg-success');
                    $('.toast').addClass('bg-danger');

                    $('.toast_message').html('<i class="fas fa-times me-1"></i> Ce nom d\'utilisateur existe déjà !')
                    $('.toast').fadeIn();

                    setTimeout(() => {
                        $('.toast').fadeOut();
                    }, 1500);

                }


            }

        });

    }

    return false;

});