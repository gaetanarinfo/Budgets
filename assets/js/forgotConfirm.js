$('#forgot_confirm').submit(function() {

    $.ajax({
        url: "../ajax/ajax-forgotConfirm.php",
        type: "POST",
        data: {
            password: $('#password').val(),
        },
        cache: false,
        success: function(data) {

            console.log(data);

            if (data == "ok") {

                $('.toast_forgot').addClass('bg-success');
                $('.toast_forgot').removeClass('bg-danger');

                $('.toast_message').html('<i class="fas fa-check me-1"></i> Mot de passe modifier')
                $('.toast_forgot').fadeIn();

                setTimeout(() => {
                    location.href = "/login";
                }, 2500);

            } else if (data = "error_token") {

                $('.toast_forgot').removeClass('bg-success');
                $('.toast_forgot').addClass('bg-danger');

                $('.toast_message').html('<i class="fas fa-check me-1"></i> Une erreur est survenue !')
                $('.toast_forgot').fadeIn();

                setTimeout(() => {
                    $('.toast_forgot').fadeOut();
                }, 2500);

            }


        }

    });

    return false;

});