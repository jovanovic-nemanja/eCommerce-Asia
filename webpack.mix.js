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
mix.styles([
    'public/assets/fontend/bootstrap-home.min.css',
    'public/assets/dashboard/css/main.css',
    'assets/fontend/bdtdccss/responsive-style.css',
    'public/assets/fontend/device-width-css/home-page-style.css',
    'public/assets/fontend/device-width-css/home-page-style.css',
    'public/css/home-page.css',
    'public/assets/global/css/components.css',
    'public/assets/global/css/components-md.css',
    'public/css/special-page.css'
], 'public/css/all.css');
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
