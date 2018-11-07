require('bootstrap');

$(document).ready(function() {
    $('#btnSender').click(function() {
        $.ajax({
            method: 'POST',
            url: action,
            dataType: 'json',
            success: function(data) {
                if (data.hasOwnProperty('response') && data.response === 'success') {
                    if (data.hasOwnProperty('posts')) {
                        // Check if a string is a valid JSON string
                        if (validateJson(data.posts)) {
                            var posts = JSON.parse(data.posts);

                            if (posts) {
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
                        } else {
                            console.log('INVALID JSON STRING');
                        }
                    } else {
                        console.log('POSTS NOT FOUND');
                    }
                }
            },
            error: function(jqXHR, exception) {
                if (jqXHR.status === 405) {
                    console.error('METHOD NOT ALLOWED!');
                }
            }
        });
    });
});
