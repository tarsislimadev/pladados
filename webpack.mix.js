let mix = require('laravel-mix');

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

mix.scripts([
    'resources/assets/js/vendor/jq.js', 
    'resources/assets/js/vendor/ko.js', 
    'resources/assets/js/vendor/bs.js', 
    'resources/assets/js/vendor/promise.js', 
    'resources/assets/js/helper/string.js',
    'resources/assets/js/helper/file.js',
    'resources/assets/js/helper/ajax.js',
    'resources/assets/js/helper/ajax/upload.js',
    'resources/assets/js/helper/ajax/loadsSave.js',
    'resources/assets/js/app.js'
], 'public/js/app.js')
   .sass('resources/assets/sass/app.scss', 'public/css');
