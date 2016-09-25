@extends('site.layouts.main')
@section('navbar-class', 'navbar-home')
@section('content')
<div class="container-fluid home-page overflow-hidden">
  <div class="row">
    <section>
      <div id="jumbotron" class="app-jumbotron col-xs-12 no-side-padding">
        <div id="img-home" class="img" data-parallax="scroll" data-image-src="{!! asset('public/assets/img/bg-home-jumbotron.png') !!}"></div>
      </div>
    </section>
    <section>
      <div id="description" class="app-description section col-xs-12 no-side-padding">
        <div class="animation-container fade col-xs-12 no-side-padding">
          <header>
            <div class="header">
              <h1 class="text-center">Somos un despacho<br/><b>DE DISEÑO</b></h1>
            </div>
          </header>
          <article>
            <div class="content col-xs-4 col-xs-offset-4">
              <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, vel, quae. Ipsum veniam minus iste explicabo molestiae rerum laboriosam itaque tenetur architecto, temporibus provident, dolores consectetur earum accusantium sit, excepturi.</p>
            </div>
          </article>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection
@section('scripts')
  <script type="text/javascript" src="{!! asset('public'.elixir('assets/js/site/home/index.js')) !!}"></script>
@endsection