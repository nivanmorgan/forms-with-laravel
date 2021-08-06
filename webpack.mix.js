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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.copyDirectory(
    'resources/css/assets', 'public/css/assets'
);
mix.autoload({
    jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"],
});


mix.options({
    // extractVueStyles: false,
    processCssUrls: false,
    postCss: [require('autoprefixer')],
});

mix.webpackConfig({
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.common.js',
        }
    }
});
