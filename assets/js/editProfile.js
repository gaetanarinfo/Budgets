$('#editProfil').submit(function() {

    $.ajax({
        url: "../ajax/ajax-editProfile.php",
        type: "POST",
        data: {
            email: $('#email').val(),
            password: $('#password').val()
        },
        cache: false,
        success: function(data) {

            if (data == "ok") {

                $('.toast_edit_profil').addClass('bg-success');
                $('.toast_edit_profil').removeClass('bg-danger');

                $('.toast_message').html('<i class="fas fa-check me-1"></i> Votre profil a été modifier !')
                $('.toast_edit_profil').fadeIn();

                setTimeout(() => {
                    location.reload();
                }, 1500);

            } else if (data == "error_password") {

                $('.toast_edit_profil').removeClass('bg-success');
                $('.toast_edit_profil').addClass('bg-danger');

                $('.toast_message').html('<i class="fas fa-times me-1"></i> Mot de passe incorrect !')
                $('.toast_edit_profil').fadeIn();

                setTimeout(() => {
                    $('.toast_message').html('')
                    $('.toast_edit_profil').fadeOut();
                }, 1500);

            }

        }

    });

    return false;

});