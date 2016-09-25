@extends('site.layouts.main')
@section('title', 'Nuestros servicios')
@section('content')
<div class="container app-services">
  <div class="row">
    <div class="col-xs-12 no-side-padding">
      <header>
        <div class="header">
          <h1 class="title">Nuestros servicios</h1>
        </div>
      </header>
    </div>
    <div class="services-container col-xs-12 no-side-padding">
      <div class="col-xs-7 col-xs-offset-4 no-side-padding">
        <div class="col-xs-12 col-xs-offset-1 no-side-padding">
          <?php 
            $n = $services->submenues->count();
            $i = 0; 
          ?>
          @foreach ($services->submenues as $submenu) 
            @if ($i % 2 == 0)
              <div class="col-xs-12 no-side-padding">
            @endif
                <ul class="services-list hidden {!! ($i % 2 == 1) ? 'col-xs-4 col-xs-offset-2' : 'col-xs-5' !!} ">
                  <li>{{ $submenu->name }}</li>
                  @foreach ($submenu->services as $service) 
                    <li>{{ $service->name }}</li>
                  @endforeach
                </ul>
            @if (($i+1) % 2 == 0 or ($i+1) == $n)
              </div>
            @endif
            <?php ++$i; ?>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script type="text/javascript" src="{!! asset('public/assets/js/site/services/index.js') !!}"></script>
@endsection