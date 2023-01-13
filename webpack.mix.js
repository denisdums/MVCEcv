const mix = require('laravel-mix');
const copyWatched = require('laravel-mix-copy-watched');

mix.setPublicPath('./public')

mix.browserSync({proxy: 'mvcecv.docker', files: ['assets/**/*', 'views/**/*']});

mix.sass('./assets/scss/app.scss', 'css');
mix.js('./assets/js/app.js', 'js');
mix.copyWatched('assets/images', 'public/images', {base: 'assets/images'});
mix.options({processCssUrls: false});

mix.sourceMaps(false, 'source-map').version();