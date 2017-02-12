const { mix } = require('laravel-mix');

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


var theme = 'default';

mix.js('resources/assets/themes/' + theme + '/js/app.js', 'public/js')
   .sass('resources/assets/themes/' + theme + '/sass/app.scss', 'public/css');
