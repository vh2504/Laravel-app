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
    .copyDirectory('themes/admin/assets/img', 'public/admin/img')
    .copyDirectory('themes/admin/assets/ckeditor', 'public/admin/ckeditor')
    .copyDirectory('themes/admin/assets/fonts', 'public/admin/fonts')
    .copyDirectory('themes/admin/assets/vendor/nucleo/fonts', 'public/admin/fonts')
    .copyDirectory('themes/admin/assets/vendor', 'public/admin/vendor')
    .copyDirectory('themes/admin/assets/tpl', 'public/admin/tpl')
    .js('themes/admin/assets/js/app.js', 'public/admin/js')
    .js('themes/admin/assets/js/ejs.js', 'public/admin/js')
    .js([
        'themes/admin/assets/js/chosen/chosen.jquery.min.js',
        'public/admin/js/app.js',
        'themes/admin/assets/js/custom.js',
    ], 'public/admin/js/app.min.js')
    .sass('themes/admin/assets/scss/argon.scss', 'public/admin/css/argon.css')
    .styles([
            'public/argon/vendor/bootstrap/dist/css/bootstrap-grid.min.css',
            'node_modules/select2/dist/css/select2.min.css',
            'themes/admin/assets/vendor/nucleo/css/nucleo.css',
            'public/admin/css/argon.css',
            'themes/admin/assets/css/custom.css',
        ],
        'public/admin/css/app.css'
    )
    // Dym
    .copyDirectory('themes/dym/assets/img', 'public/dym/img')
    .js('themes/dym/assets/js/bootstrap.js', 'public/dym/js/app.js')
    .js([
        'public/dym/js/app.js',
        'themes/dym/assets/js/custom.js',
        'themes/dym/assets/js/guest.js'
    ], 'public/dym/js/app.min.js')
    .sass('themes/dym/assets/scss/app.scss', 'public/dym/css/app.css')
.version();
