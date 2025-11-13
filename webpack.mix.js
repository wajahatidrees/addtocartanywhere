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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');


mix.styles([
    'public/css/app.css',
    'public/css/uptown.css',
    'public/css/widgetSupport.css',
    'public/css/slick-theme.css',
    'public/css/slick.css',
    'public/css/fancybox.css',
    'public/css/topBarWidget.css',
    'public/css/footer.css',
    'public/tourGuide/badges.css',
    'public/tourGuide/badges.css',
    'public/css/custom_button_icon.css',
    'public/css/iconbutton.css',
    'public/tourGuide/style.css'
], 'public/css/all.css');

mix.scripts([
    'public/js/jquery-3.3.1.min.js',
    'public/js/app.js',
    'public/js/moment.min.js',
    'public/js/select2.min.js',
    'public/js/common.js',
    'public/js/custom-dropdown.js',
    'public/js/slick.min.js',
    'public/js/fancybox.umd.js',
    'public/js/jscolor.min.js',
], 'public/js/all.js');

mix.version();
