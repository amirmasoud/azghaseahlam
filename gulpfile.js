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
        'portfolio.css'
    ]);

    mix.scripts([
    	'jquery.js',
        'angular.min.js',
        'bootstrap.js',
        'portfolio.js',
        'modal.js',
        'ng-infinite-scroll.min.js',
        'services/imageService.js',
        'controllers/mainCtrl.js',
        'app.js',
    ]);

    mix.version(['css/all.css', 'js/all.js']);
});
