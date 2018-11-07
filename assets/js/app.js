// app.js
global.$ = global.jQuery = require('jquery');

// JS is equivalent to the normal "bootstrap" package no need to set this to a variable, just require it
require('bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

$(document).ready(function() {
    $('#currentYear').text(new Date().getFullYear());
    $('.dropdown-item').draggable = false;
});
