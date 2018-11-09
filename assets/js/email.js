require('bootstrap');

$(document).ready(function() {
    $('#btnSender').click(function() {
        sendEmail();
    });
});

(function ($) {
    function sendEmail() {
        var pData = {
            firstName: 'Prueba Nombre',
            lastName: 'Prueba Apellidos',
            from: 'pruebacorreo@correo.es',
            subject: 'Prueba Asunto',
            message: 'Prueba Mensaje',
        };

        var executeFunction = function(sendResult) {
            if (sendResult) {
                $('#messageTitleIcon').html(messageSuccessIcon);
                $('#messageTitle').html(messageSuccessTitle);
                $('#messageBodyIcon').html(messageSuccessIconLarge);
                $('#messageBody').html(messageSuccessBody);
            } else {
                $('#messageTitleIcon').html(messageErrorIcon);
                $('#messageTitle').html(messageErrorTitle);
                $('#messageBodyIcon').html(messageErrorIconLarge);
                $('#messageBody').html(messageErrorBody);
            }

            $('#modalResult').modal('show');
        };

        sendPostAjax(action, pData, executeFunction);
    }

    window.sendEmail = sendEmail;
})(jQuery);
