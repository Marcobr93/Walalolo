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

mixc
    .sass('resources/assets/sass/app.scss', 'public/css')
    .js('node_modules/izimodal/js/iziModal.js', 'public/js')
    .styles(['node_modules/izimodal/css/iziModal.css'], 'public/css/iziModal.css')
    .js('resources/assets/js/walalolo.js', 'public/js')
    .js('resources/assets/js/datos.js', 'public/js')
    .js('resources/assets/js/validacionEditar.js', 'public/js')
    .js('resources/assets/js/validacionProducto.js', 'public/js')
    .js('resources/assets/js/validacionRegistro.js', 'public/js');
