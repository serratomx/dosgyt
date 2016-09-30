@extends('site.layouts.main')
@section('title', $title)
@section('content')
<div class="container app-portfolio">
  <div class="row">
    <div class="col-xs-12 no-side-padding">
      <header>
        <div class="header">
          <h1 class="title">Portafolio</h1>
        </div>
      </header>
    </div>
    <div class="col-xs-12 text-left no-side-padding">
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
            <?php $k = $submenu->keyword ?>
            @if ($k == 'corporate-identity' or
                 $k == 'editorial-design' or 
                 $k == 'social-network')
              <li role="presentation" class="{!! ($submenu->keyword == $tabActive) ? 'active' : '' !!}">
                <a aria-controls="{{ $submenu->name }}" data-title="{{ $submenu->name }}" data-url="{{ URL::to('/portfolio/'.$submenu->keyword) }}" data-id="{{ $submenu->keyword }}" role="tab" data-toggle="tab" href="#{{ $submenu->keyword }}">{!! $submenu->name !!}</a>
              </li>
            @else 
              <li>
                <a href="{{ URL::to('/portfolio/'.$submenu->keyword.'/viewer') }}">{!! $submenu->name !!}</a>
              </li>
            @endif
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
          <div id="{{ $submenu->keyword }}" class="tab-pane col-xs-12 no-side-padding {!! ($submenu->keyword == $tabActive) ? 'active' : '' !!}" role="tabpanel">
            <div class="col-xs-12">
              <?php
                $num_clients = $submenu->clients->count();
                $i = 0;
              ?>
              @if ($submenu->keyword == 'corporate-identity')
                @foreach ($submenu->clients()->orderBy('order_priority', 'ASC')->get() as $client)
                    <div class="col-xs-3 no-side-padding">
                      <div id="client-container-{!! $i !!}" class="client-container hidden col-xs-12 no-side-padding text-center hvr-grow">
                        <a href="{!! URL::to('/portfolio/'.$submenu->keyword.'/viewer/'.$client->keyword) !!}" title="Ver {!! $client->name !!}">
                          <div class="client-image inline-block" style="background-image: url({!! asset($client->logo_link) !!});"></div>
                        </a>
                      </div>
                    </div>
                  <?php ++$i ?>
                @endforeach
              @elseif ($submenu->keyword == 'editorial-design')
                @foreach ($submenu->clients()->orderBy('order_priority', 'ASC')->get() as $client)
                    <div class="col-xs-12 no-side-padding">
                      <div class="col-xs-3 col-xs-offset-1 no-side-padding">
                        <div id="client-container-{!! $i !!}" class="client-container hidden col-xs-12 no-side-padding text-center hvr-grow">
                          <a href="{!! URL::to('/portfolio/'.$submenu->keyword.'/viewer/'.$client->keyword) !!}" title="Ver {!! $client->name !!}">
                            <div class="client-image inline-block" style="background-image: url({!! asset($client->logo_link) !!});"></div>
                          </a>
                        </div>
                      </div>
                    </div>
                  <?php ++$i ?>
                @endforeach
              @elseif ($submenu->keyword == 'social-network')
                @foreach ($submenu->clients()->orderBy('order_priority', 'ASC')->get() as $client)
                    <div class="col-xs-12 no-side-padding">
                      <div class="col-xs-3 col-xs-offset-3 no-side-padding">
                        <div id="client-container-{!! $i !!}" class="client-container hidden col-xs-12 no-side-padding text-center hvr-grow">
                          <a href="{!! URL::to('/portfolio/'.$submenu->keyword.'/viewer/'.$client->keyword) !!}" title="Ver {!! $client->name !!}">
                            <div class="client-image inline-block" style="background-image: url({!! asset($client->logo_link) !!});"></div>
                          </a>
                        </div>
                      </div>
                    </div>
                  <?php ++$i ?>
                @endforeach
              @endif
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
  <script type="text/javascript" src="{!! asset('public'.elixir('assets/js/site/portfolio/index.js')) !!}"></script>
@endsection