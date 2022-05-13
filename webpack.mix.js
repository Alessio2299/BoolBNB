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

mix.js('resources/js/apartment/create.js', 'public/js/formApartment.js')
    .js('resources/js/front.js', 'public/js')
    .js('resources/js/apartment/index.js', 'public/js')
    .js('resources/js/messages/index.js', 'messages/js')
    .sass('resources/sass/app.scss', 'public/css');
