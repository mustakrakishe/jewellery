const { forEach } = require("lodash");
window.$ = window.jQuery = require('jquery');

$(document).ready(function(){
    $('#newType').change(function(){
        if($(this).prop('checked') == true){
            $('#type').replaceWith('<input type="text" name="type" id="type" class="form-control" placeholder="Тип" class="form-control"  required>');
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

    $('#pic').change(function(event){
       $('#preview').attr('src', URL.createObjectURL(event.target.files[0]));
    })
});