// app.js
global.$ = global.jQuery = require('jquery');

// JS is equivalent to the normal "bootstrap" package no need to set this to a variable, just require it
require('bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

$(document).ready(function() {
    $('#currentYear').text(new Date().getFullYear());
    $('.dropdown-item').draggable = false;
});

(function ($) {
    function closePostit() {
        var pData = {
            postItName: 'postit-news',
            isVisible: false
        };

        var executeFunction = function(result) {
            if (!result[pData.postItName]) {
                $('#postit-news').fadeOut(1000);
            }
        };

        sendPostAjax(action, pData, executeFunction);
    }

    window.closePostit = closePostit;
})(jQuery);
