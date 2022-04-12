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

mix
    .js('resources/js/app.js', 'public/js/app.js')
    .js('resources/js/section/program.js', 'public/js/section/program.js')
    .styles('resources/css/app.css', 'public/css/app.css')
    .styles('resources/css/information.css', 'public/css/information.css')
    .styles('resources/css/program.css', 'public/css/program.css')
    .styles('resources/css/team.css', 'public/css/team.css');
