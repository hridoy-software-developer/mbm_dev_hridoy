const mix = require('laravel-mix');
const path = require('path');

mix.js('resources/js/app.js', 'public/js').vue()
.postCss('resources/css/app.css', 'public/css', [
    require("tailwindcss")
]);

mix.webpackConfig({
    output: {
        chunkFilename: "js/[name].js?id=[chunkhash]",
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
            '~': path.resolve(__dirname, 'Modules'),
            '*': path.resolve(__dirname, 'resources/views'),
        }
    },
});
