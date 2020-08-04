window.$ = window.jQuery = require('jquery');

$(document).ready(function(){
    $('.product-content-cell').mouseenter(function(){
        $(this).removeClass('shadow-sm');
        $(this).addClass('shadow');
    })

    $('.product-content-cell').mouseleave(function(){
        $(this).removeClass('shadow');
        $(this).addClass('shadow-sm');
    })
})