const mix = require('laravel-mix');
require('laravel-mix-purgecss');

mix.disableNotifications();

// mix.js('resources/js/app.js', 'public/js');
// mix.extract();

mix.sass('resources/sass/app.scss', 'public/css');
mix.purgeCss();

mix.version();
