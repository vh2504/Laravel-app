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

// Admin
mix
    .copyDirectory('assets/img', 'static/img')
    .copyDirectory('assets/css', 'static/css')
    .js('assets/js/app.js', 'static/js/app.js')
    .js([
        'static/js/app.js',
        'assets/js/guest.js',
        'assets/js/custom.js',
    ], 'static/js/app.min.js')
    .sass('assets/scss/app.scss', 'static/css/app.css');
