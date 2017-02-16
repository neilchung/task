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
    mix.sass('app.scss')
        .scripts([
            'charts/Chart.js',
            'charts/pie.js',
            'charts/bar.js'
        ],
        'public/js/charts.js');
    mix.copy('bower_components/bootstrap/dist/js/bootstrap.js','public/js/bootstrap.js');
    mix.copy('bower_components/font-awesome/css/font-awesome.css','public/css/font-awesome.css');
    mix.copy('bower_components/font-awesome/fonts/','public/fonts/');
    mix.copy('bower_components/jquery/dist/jquery.js','public/js/jquery.js');
    mix.copy('bower_components/chart.js/dist/Chart.js','public/js/Chart.js');
});
