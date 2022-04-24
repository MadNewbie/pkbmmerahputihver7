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
    // Forecourt
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/section/program.js', 'public/js/section')

    // Backyard
    // Role
    .js('/resources/js/backyard/role/index.js', 'public/js/backyard/role')

    // Forecourt
    .postCss('resources/css/app.css', 'public/css/app.css')
    .postCss('resources/css/information.css', 'public/css/information.css')
    .postCss('resources/css/program.css', 'public/css/program.css')
    .postCss('resources/css/gate.css', 'public/css/gate.css')
    .postCss('resources/css/backyard.css', 'public/css/backyard.css');
