var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        'bootstrap.css',
        'bootflat.css',
        'portfolio.css',
        'loading-bar.min.css'
    ]);

    mix.scripts([
        'google-analystics.js',
        'jquery.js',
        'angular.min.js',
        'ng-ui-bootstrap.min.js',
        'icheck.min',
        'jquery.fs.selecter.min.js',
        'jquery.fs.stepper.min.js',
        'ng-route.min.js',
        'ng-hotkeys.min.js',
        'ng-sanitize.min.js',
        'ng-loading-bar.min.js',
        'ng-infinite-scroll.min.js',
        'services/imageService.js',
        'controllers/mainCtrl.js',
        'controllers/modalCtrl.js',
        'app.js',
    ]);

    mix.version(['css/all.css', 'js/all.js']);
});
