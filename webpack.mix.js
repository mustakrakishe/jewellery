const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/catalogue/catalogue.js', 'public/js/catalogue')
    .js('resources/js/catalogue/addProduct.js', 'public/js/catalogue')
    .js('resources/js/catalogue/productList.js', 'public/js/catalogue')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/inc/productList.scss', 'public/css/inc');