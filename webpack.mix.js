// webpack.mix.js

let mix = require('laravel-mix');

mix
    .js('src/js/app.js', 'public/assets/js')
    .sass('src/sass/app.scss', 'public/assets/css');