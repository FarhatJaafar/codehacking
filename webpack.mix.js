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
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'resources/css/styles.css'
    ], './public/css/admin.css')
    .scripts([
        'resources/js/chart-area-demo.js',
        'resources/js/chart-bar-demo.js',
        'resources/js/chart-pie-demo.js',
        'resources/js/datatables-demo.js',
        'resources/js/datatables-simple-demo.js',
        'resources/js/scripts.js',
    ], './public/js/admin.js')
;
