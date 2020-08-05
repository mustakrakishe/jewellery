window.$ = window.jQuery = require('jquery');

$(document).ready(function(){
    $('#allTypes, [class=type]').prop('checked', true);

    $('#allTypes').change(function(){
        if ($(this).is(':checked')){
            $('[class=type]').prop('checked', true);
        }
        else{
            $('[class=type]').prop('checked', false);
        }
    });

    $('[class=type]').change(function(){
        if ($(this).not(':checked') && $('#allTypes').is(':checked')){
            $('#allTypes').prop('checked', false);
        }
    });

    $('#orderControl').change(function(){
        $('#presentRulesForm').submit();
    });

    $('#presentRulesForm').submit(function(event){
        event.preventDefault();

        $.ajax({
            url: '/catalogue/getProguctSelection',
            type: "POST",
            data: $('#presentRulesForm').serializeArray(),
        })
        .done(function(data){
            if(data){
                $('.product_cell:not(#addNewProduct)').remove();
                for(productId in data){
                    var product = data[productId];
                    var imgPath = "/storage/" + product.imagePath;
                    var link = '/catalogue/product_' + product.id;
                    $('.product_container').append(
                        '<div class="product_cell col-md-4 col-6 mb-4">'
                            +'<a href="' + link + '">'
                                +'<div class="row m-0 p-0">'
                                    +'<div class="col text-center mx-auto px-5 bg-white product-content-cell shadow-sm">'
                                        +'<div class="row my-3 image" style="height:200px"><img src="' + imgPath + '" height="100%" class="mx-auto"></div>'
                                        +'<div class="row text-center mb-2 title"><p class="mx-auto title">' + product.title + '</p></div>'
                                        +'<div class="row text-center cost"><p class="cost mx-auto">' + number_format(product.cost, 0, ',', ' ') + ' грн.</p></div>'
                                    +'</div>'
                                +'</div>'
                            +'</a>'
                        +'</div>'
                    );
                };

                $('.product-content-cell').mouseenter(function(){
                    $(this).removeClass('shadow-sm');
                    $(this).addClass('shadow');
                })
            
                $('.product-content-cell').mouseleave(function(){
                    $(this).removeClass('shadow');
                    $(this).addClass('shadow-sm');
                })
            }
        })
    })
})

function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}