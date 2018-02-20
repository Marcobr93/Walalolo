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

mix
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles(['node_modules/izimodal/css/iziModal.css'], 'public/css/iziModal.css')
    .styles(['resources/assets/css/spinner.css'], 'public/css/spinner.css')
    .js('resources/assets/js/collapse.js', 'public/js')
    .js('resources/assets/js/modal.js', 'public/js')
    .js('resources/assets/js/datos.js', 'public/js')
    .js('resources/assets/js/validacionEditar.js', 'public/js')
    .js('resources/assets/js/validacionProducto.js', 'public/js')
    .js('resources/assets/js/validacionRegistro.js', 'public/js');


mix.babel('node_modules/izimodal/js/iziModal.min.js', 'public/js/izimodal.min.js');
mix.babel('node_modules/lozad/dist/lozad.js', 'public/js/lozad.js');



