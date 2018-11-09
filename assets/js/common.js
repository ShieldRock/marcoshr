/**
 * Function to validate if a string is a valid JSON string
 * @param jsonString The JSON string
 * @returns {boolean}
 */
(function ($) {
    function validateJson(jsonString) {
        if (/^[\],:{}\s]*$/.test(jsonString.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
            return true;
        }

        return false;
    }

    function sendPostAjax(pAction, pParams, callback) {
        $.ajax({
            method: 'POST',
            url: pAction,
            dataType: 'json',
            data: pParams,
            success: function(data) {
                if (data.hasOwnProperty('response') && data.response === 'success') {
                    if (data.hasOwnProperty('result')) {
                        // Check if a string is a valid JSON string
                        if (validateJson(data.result)) {
                            var result = JSON.parse(data.result);
                            callback(result);
                        } else {
                            console.log('Invalid JSON String');
                        }
                    } else {
                        console.log('Result Not Found');
                    }
                }
            },
            error: function(jqXHR, exception) {
                if (jqXHR.status === 405) {
                    console.error('Method Not Allowed!: ' + exception);
                }
            }
        });
    }

    // Register global functions por the application
    window.validateJson = validateJson;
    window.sendPostAjax = sendPostAjax;
})(jQuery);
