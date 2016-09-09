<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>2GyT | Soluciones Gráficas</title>
  <!-- START [Cascade Style Sheet Files] -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&subset=latin-ext" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/animate.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/hover.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/bootstrap.min.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/font-awesome.min.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/style.css') !!}">
  <!-- END [Cascade Style Sheet Files] -->
</head>
<body>
  <div class="container-fluid @yield('navbar-class')">
    <div class="row">
      <header>
        <div id="navbar" class="app-navbar col-xs-12">
          <div class="col-xs-6 logo-container">
            <img src="{!! asset('public/assets/img/logo-dosgyt.png') !!}" class="img-logo">
          </div>
          <div class="col-xs-6 button-container">
            <div id="btn-menu" class="pull-right dropdown">
              <button class="menu-button hvr-sweep-to-top btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                <span class="fa fa-bars"></span>
              </button>
              <ul class="menu-dropdown dropdown-menu" role="menu" aria-labelledby="mainMenu">
                <li>
                  <a href="#">Portafolio</a>
                  <ul class="submenu-dropdown">
                    <li><a href="#">Imagen corporativa</a></li>
                    <li><a href="#">Diseño industrial</a></li>
                    <li><a href="#">Redes sociales</a></li>
                    <li><a href="#">Campañas publicitarias</a></li>
                    <li><a href="#">Sistemas de información</a></li>
                    <li><a href="#">Fotografía</a></li>
                    <li><a href="#">Ilustración</a></li>
                  </ul>
                </li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Nuestros<br/>clientes</a></li>
                <li><a href="#">Contacto</a></li>
              </ul>
            </div>
          </div>
        </div>
      </header>
    </div>
  </div>
  @yield('content')
  <div class="container-fluid">
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
  <script type="text/javascript" src="{!! asset('public/assets/js/jquery.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/js/jquery.validate.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/js/jquery.anchor.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/js/bootstrap.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/js/scrollspy.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/js/parallax.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/js/app.js') !!}"></script>
  <!-- END [JavaScript Files] -->
  @yield('scripts')
</body>
</html>