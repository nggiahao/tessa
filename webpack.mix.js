const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */
mix.options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')]
})

mix
    .js('src/resources/assets/js/app.js', 'src/public/packages/tessa/js/app.min.js')
    .sass('src/resources/assets/scss/app.scss', 'src/public/packages/tessa/css/app.min.css')
    /** Mix themes */
    .sass('src/resources/assets/scss/themes/light.scss', 'src/public/packages/tessa/css/themes/light.min.css')
    .sass('src/resources/assets/scss/themes/dark.scss', 'src/public/packages/tessa/css/themes/dark.min.css')