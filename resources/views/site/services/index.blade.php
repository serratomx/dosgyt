@extends('site.layouts.main')
@section('title', 'Nuestros servicios')
@section('content')
<div class="container-fluid app-services">
  <div class="row">
    <div class="col-xs-12 no-side-padding">
      <header>
        <div class="header">
          <h1 class="title">Nuestros servicios</h1>
        </div>
      </header>
    </div>
    <div class="services-container col-xs-12 no-side-padding">
      <div class="col-xs-6 col-xs-offset-5 no-side-padding">
        <?php 
          $n = $services->submenues->count();
          $i = 0; 
        ?>
        @foreach ($services->submenues as $submenu) 
          @if ($i % 2 == 0)
            <div class="col-xs-12 no-side-padding">
          @endif
              <ul class="services-list col-xs-6">
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
@endsection
@section('scripts')
  
@endsection