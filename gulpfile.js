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
    mix
      .sass([
        '../css/jquery.loading.css',
        '../css/animate.css',
        '../css/hover.css',
        '../css/bootstrap.min.css',
        '../css/font-awesome.min.css',
        'site/app.style.scss'
      ], 'public/assets/css/site/common.css')

      .scripts([
        'jquery.min.js',
        'jquery.loading.js',
        'jquery.validate.js',
        'jquery.anchor.js',
        'bootstrap.min.js',
        'scrollspy.js',
        'parallax.js',
        'site.js'
      ], 'public/assets/js/site/common.js')


      .scripts('site/home/index.js', 'public/assets/js/site/home/index.js')
      .scripts('site/portfolio/index.js', 'public/assets/js/site/portfolio/index.js')
      .scripts('site/portfolio/viewer/index.js', 'public/assets/js/site/portfolio/viewer/index.js')
      .scripts('site/services/index.js', 'public/assets/js/site/services/index.js')
      .scripts('site/ourClients/index.js', 'public/assets/js/site/ourClients/index.js')
      .scripts('site/contact/index.js', 'public/assets/js/site/contact/index.js')

      .version([
        'assets/css/site/common.css', 
        'assets/js/site/common.js',
        'assets/js/site/home/index.js',
        'assets/js/site/portfolio/index.js',
        'assets/js/site/portfolio/viewer/index.js',
        'assets/js/site/services/index.js',
        'assets/js/site/ourClients/index.js',
        'assets/js/site/contact/index.js'
      ])
});
