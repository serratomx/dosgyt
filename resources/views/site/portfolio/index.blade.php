@extends('site.layouts.main')
@section('title', $title)
@section('content')
<div class="container-fluid app-portfolio">
  <div class="row">
    <div class="col-xs-12 no-side-padding">
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
            <div class="col-xs-12 no-side-padding">
              <?php
                $num_clients = $submenu->clients->count();
                $remaining_clients = ($num_clients % 4);
                $last_clients = $num_clients - $remaining_clients; 
                $i = 0;
                $j = 0;
                $prev = 0;
              ?>
              @foreach ($submenu->clients()->orderBy('order_priority', 'ASC')->get() as $client)
                @if ($i%4 == 0)
                  @if ($i > $prev)
                    </div>
                  @endif
                  <?php 
                    $prev = $i;
                    $any_item = $num_clients - ($i + 1);
                  ?>
                  @if ($any_item)
                    @if ($i == $last_clients and $remaining_clients == 3)
                      <div class="col-xs-8 col-xs-offset-2 no-side-padding">
                    @else
                      <div class="col-xs-12 no-side-padding">
                    @endif
                  @endif
                @endif
                @if ($i >= $last_clients) 
                  @if ($remaining_clients == 3)
                    <div class="col-xs-4">
                  @elseif ($j == 0 and $remaining_clients == 2)
                    <div class="col-xs-offset-3 col-xs-3">
                  @elseif ($j == 1 and $remaining_clients == 2)
                    <div class="col-xs-3">
                  @else 
                    <div class="col-xs-offset-4 col-xs-4">
                  @endif
                  <?php ++$j ?>
                @else 
                  <div class="col-xs-3">
                @endif
                    <div class="text-center">
                      <div class="img-circle s100x100 inline-block" style="background-image: url({!! asset($client->cover_page_link) !!}); background-size: cover;"></div>
                    </div>
                  </div>
                <?php ++$i ?>
              @endforeach
              @if ($any_item)
                </div>
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
  <script type="text/javascript" src="{!! asset('public/assets/js/site/portfolio/index.js') !!}"></script>
@endsection