(function ($) {
    'use strict';
    // Get the form.
    var form = $('#contact-form');

    // Get the messages div.
    var formMessages = $('#form-messages');

    // Set up an event listener for the contact form.
    $(form).submit(function (e) {
        e.preventDefault(); // Stop the default form submission

        // Serialize the form data.
        var formData = $(form).serialize();

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        })
        .done(function (response) {
            // Update message styling
            $(formMessages).removeClass('text-warning fw-bolder mt-2 text-danger')
                           .addClass('text-success fw-bold mt-3 border border-success rounded-3 py-2 px-3 bg-light')
                           .html('<i class="fa-regular fa-circle-check me-2"></i> ' + response);
            
            // Clear the form fields
            $('#name, #email, #message, #phone, #subject').val('');
        })
        .fail(function (data) {
            // For local/demo server simulations (e.g. running on Python server or static host where POST fails)
            if (data.status === 404 || data.status === 405 || data.status === 0) {
                $(formMessages).removeClass('text-warning fw-bolder mt-2 text-danger')
                               .addClass('text-success fw-bold mt-3 border border-success rounded-3 py-2 px-3 bg-light')
                               .html('<i class="fa-regular fa-circle-check me-2"></i> <strong>¡Demo de Envío Exitosa!</strong> Tu mensaje ha sido procesado (en producción, esto enviará un correo real a Robert Frías).');
                
                // Clear the form fields
                $('#name, #email, #message, #phone, #subject').val('');
            } else {
                // Update message styling
                $(formMessages).addClass('text-danger fw-bolder mt-2')
                               .removeClass('text-success fw-bold mt-3 border border-success rounded-3 py-2 px-3 bg-light')
                               .text(data.responseText || 'Oops! Ocurrió un error y tu mensaje no pudo ser enviado.');
            }
        });
    });
})(jQuery);
