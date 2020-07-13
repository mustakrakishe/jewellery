window.$ = window.jQuery = require('jquery');

$(document).ready(function(){
    $('.product-content-cell').mouseenter(function(){
        $(this).toggleClass('shadow-sm shadow');
    })

    $('.product-content-cell').mouseleave(function(){
        $(this).toggleClass('shadow shadow-sm');
    })
})