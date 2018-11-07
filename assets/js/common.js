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

    window.validateJson = validateJson;
})(jQuery);
