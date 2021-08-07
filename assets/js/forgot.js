$('#forgot').submit(function() {

    $.ajax({
        url: "../ajax/ajax-forgot.php",
        type: "POST",
        data: {
            email: $('#email').val(),
        },
        cache: false,
        success: function(data) {

            if (data == "ok") {

                $('.toast_forgot').addClass('bg-success');
                $('.toast_forgot').removeClass('bg-danger');

                $('.toast_message').html('<i class="fas fa-check me-1"></i> Merci de vérifier votre boîte email')
                $('.toast_forgot').fadeIn();

                setTimeout(() => {
                    location.href = "/";
                }, 2500);

            } else if (data == "error_email") {

                $('.toast_forgot').removeClass('bg-success');
                $('.toast_forgot').addClass('bg-danger');

                $('.toast_message').html('<i class="fas fa-check me-1"></i> L\'adresse email n\'éxiste pas !')
                $('.toast_forgot').fadeIn();

                setTimeout(() => {
                    $('.toast_forgot').fadeOut();
                }, 2500);

            }


        }

    });

    return false;

});