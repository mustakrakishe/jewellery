window.$ = window.jQuery = require('jquery');

$(document).ready(function(){
    $('.product-cell-content').mouseenter(function(){
        $(this).removeClass('shadow-sm');
        $(this).addClass('shadow');
    })

    $('.product-cell-content').mouseleave(function(){
        $(this).removeClass('shadow');
        $(this).addClass('shadow-sm');
    })
})