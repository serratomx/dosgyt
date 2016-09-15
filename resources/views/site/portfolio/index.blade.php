@extends('site.layouts.main')
@section('title', $title)
@section('content')
<div class="container-fluid app-portfolio">
  <div class="row">
    <div class="col-xs-12 no-side-padding">
      <header>
        <div class="header">
          <h1 class="title">Portafolio</h1>
        </div>
      </header>
    </div>
    <div class="col-xs-12 text-center no-side-padding">
      <ul class="tablist" role="tablist">
        <?php 
          $menuSearch = App\Submenu::whereKeyword('portfolio');
        ?>
        @if ($menuSearch->count() == 1)
          <?php 
            $menu = $menuSearch->first();
            $i = 0;
          ?>
          @foreach ($menu->submenues as $submenu)
            <li role="presentation" class="{!! ($submenu->keyword == $tabActive) ? 'active' : '' !!}">
              <a aria-controls="{{ $submenu->name }}" data-title="{{ $submenu->name }}" data-url="{{ URL::to('/portfolio/' . $submenu->keyword) }}" data-id="{{ $submenu->keyword }}" role="tab" data-toggle="tab" href="#{{ $submenu->keyword }}">{!! $submenu->name !!}</a>
            </li>
            <?php ++$i ?>
          @endforeach
        @endif
      </ul>
    </div>
    <div class="tab-content col-xs-12 no-side-padding">
      @if ($menuSearch->count() == 1)
        <?php
          $menu = $menuSearch->first();
          $i = 0;
        ?>
        @foreach ($menu->submenues as $submenu)
          <div id="{{ $submenu->keyword }}" class="tab-pane {!! ($submenu->keyword == $tabActive) ? 'active' : '' !!}" role="tabpanel">
            <div class="col-xs-12 custom-padding-1">
              <?php
                $num_clients = $submenu->clients->count();
                $i = 0;
              ?>
              @foreach ($submenu->clients()->orderBy('order_priority', 'ASC')->get() as $client)
                  <div class="col-xs-3 no-side-padding">
                    <div id="client-container-{!! $i !!}" class="client-container hidden col-xs-12 no-side-padding text-center hvr-grow">
                      <a href="#" title="Ver {!! $client->name !!}">
                        <div class="client-image inline-block" style="background-image: url({!! asset($client->logo_link) !!});"></div>
                      </a>
                    </div>
                  </div>
                <?php ++$i ?>
              @endforeach
            </div>
          </div>
          <?php ++$i ?>
        @endforeach
      @endif
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script type="text/javascript" src="{!! asset('public/assets/js/site/portfolio/index.js') !!}"></script>
@endsection