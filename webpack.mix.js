const {mix} = require('laravel-mix');

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


// var theme = 'default';
var theme = 'clean';

mix.js('resources/assets/themes/' + theme + '/js/app.js', 'public/js')
    .sass('resources/assets/themes/' + theme + '/sass/app.scss', 'public/css');

mix.js('resources/assets/backend/js/backend.js', 'public/js')
    .sass('resources/assets/backend/sass/backend.scss', 'public/css');


mix.copy('node_modules/simplemde/dist/simplemde.min.css', 'public/css');
mix.copy('node_modules/simplemde/dist/simplemde.min.js', 'public/js');
