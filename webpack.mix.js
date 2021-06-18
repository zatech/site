const mix = require('laravel-mix');
require('laravel-mix-purgecss');

mix.disableNotifications();

mix.sass('resources/sass/app.scss', 'public/css');
mix.purgeCss();

mix.version();
