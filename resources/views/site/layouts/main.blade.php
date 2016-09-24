<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>2G&T | @yield('title', 'Soluciones Gráficas')</title>
  <!-- START [Favicon] -->
  <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('public/assets/img/favicon/apple-touch-icon.png') !!}">
  <link rel="icon" type="image/png" href="{!! asset('public/assets/img/favicon/favicon-32x32.png') !!}" sizes="32x32">
  <link rel="manifest" href="{!! asset('public/assets/img/favicon/manifest.json') !!}">
  <link rel="mask-icon" href="{!! asset('public/assets/img/favicon/safari-pinned-tab.svg') !!}" color="#333333">
  <meta name="theme-color" content="#ffffff">
  <!-- END [Favicon] -->
  <!-- START [Cascade Style Sheet Files] -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&subset=latin-ext" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/jquery.loading.css?v='.time()) !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/animate.css?v='.time()) !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/hover.css?v='.time()) !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/bootstrap.min.css?v='.time()) !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/font-awesome.min.css?v='.time()) !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/style.css?v='.time()) !!}">
  <!-- END [Cascade Style Sheet Files] -->
</head>
<body>
  <div class="container @yield('navbar-class')">
    <div class="row">
      <header>
        <div id="navbar" class="app-navbar col-xs-12 {!! (isset($navbarFixed) and !$navbarFixed) ?: 'app-navbar-fixed' !!}">
          <div class="col-xs-6 logo-container">
            <a href="{!! URL::to('/') !!}">
              <img src="{!! asset('public/assets/img/logo-dosgyt.png') !!}" class="img-logo">
            </a>
          </div>
          <div class="col-xs-6 button-container">
            <div id="btn-menu" class="pull-right dropdown">
              <button class="menu-button hvr-sweep-to-top btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                <span class="fa fa-bars"></span>
              </button>
              <ul class="menu-dropdown dropdown-menu" role="menu" aria-labelledby="mainMenu">
                <?php 
                  $menu = App\Menu::whereKeyword('main');
                ?>
                @if ($menu->count() == 1)
                  <?php
                    $menu = $menu->first();
                  ?>
                  @foreach ($menu->submenues as $submenu)
                    <li>
                      <a href="{!! !empty($submenu->url) ? URL::to($submenu->url) : '#' !!}">{!! $submenu->name !!}</a>
                      <?php 
                        $menu = $submenu;
                      ?>
                      @if ($menu->submenues->count() > 0 and $menu->keyword != 'services')
                        <ul class="submenu-dropdown">
                          @foreach ($menu->submenues as $submenu)
                            <?php $k = $submenu->keyword; ?>
                            @if ($k == 'corporate-identity' or
                                 $k == 'editorial-design' or 
                                 $k == 'social-network')
                              <li><a href="{!! URL::to('/'.$menu->keyword.'/'.$submenu->keyword) !!}">{!! $submenu->name !!}</a></li>
                            @else
                              <li><a href="{!! URL::to('/'.$menu->keyword.'/'.$submenu->keyword.'/viewer') !!}">{!! $submenu->name !!}</a></li>
                            @endif
                          @endforeach
                        </ul>
                      @endif
                    </li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
        @if (!isset($navbarFixed) or (isset($navbarFixed) and $navbarFixed))
          <div class="app-navbar-space"></div>
        @endif
      </header>
    </div>
  </div>
  @yield('content')
  <div class="container">
    <div class="row">
      <section>
        <div class="app-footer col-xs-12">
          <div class="col-xs-12 copyright">
            <p class="text-center">Copyright &copy; {!! date('Y') !!} | Todos los derechos reservados.</p>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- START [JavaScript Files] -->
  <script type="text/javascript" src="{!! asset('public/assets/js/jquery.min.js?'.time()) !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/js/jquery.loading.js?'.time()) !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/js/jquery.validate.js?'.time()) !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/js/jquery.anchor.js?'.time()) !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/js/bootstrap.min.js?'.time()) !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/js/scrollspy.js?'.time()) !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/js/parallax.js?'.time()) !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/js/app.js?'.time()) !!}"></script>
  <!-- END [JavaScript Files] -->
  @yield('scripts')
</body>
</html>