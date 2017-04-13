const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/usr.js', 'public/js')
   .js('resources/assets/js/Roles.js', 'public/js')
   .js('resources/assets/js/permission.js', 'public/js')
   .js('resources/assets/js/Stock.js', 'public/js')
   .js('resources/assets/js/service.js', 'public/js')
   .js('resources/assets/js/member.js', 'public/js')
   .js('resources/assets/js/Kasir.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
