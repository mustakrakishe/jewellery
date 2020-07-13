const { forEach } = require("lodash");
window.$ = window.jQuery = require('jquery');

$(document).ready(function(){
    $('#newType').change(function(){
        if($(this).prop('checked') == true){
            $('#type').replaceWith('<input type="text" name="type" id="type" placeholder="Тип" class="form-control">');
        }
        else{
            $('#type').replaceWith(
                '<select class="custom-select" name="type" id="type"></select>'
            );

            $.get( "addProduct/getProductTypes", function(types){
                types.forEach(function(type){
                    $('#type').append('<option value="' + type.id + '">' + type.title + '</option>');
                });
            }, "json");
        }
    })
});