const mix = require('laravel-mix');

mix.setPublicPath('./webroot')
    .js('assets/js/app.js', 'webroot/js')
    //.sass('assets/sass/app.scss', 'webroot/css')
    //.version();
mix.options({
    hmrOptions: {
        host: 'coachmenew',  // site's host name
        port: 8080,
    }
});
mix.webpackConfig({
    devServer: {
        host: '0.0.0.0',
        port: 8080,
    },
});
