var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less', "public/assets/css/style.css");
    mix.less('bootstrap-dialog.less', "public/assets/css/bootstrap-dialog.css");
    mix.scripts('custom.js',"public/assets/js/custom.js");
    mix.scripts('bootstrap-dialog.min.js',"public/assets/js/bootstrap-dialog.min.js");
});
