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
          @foreach ($menu->submenues as $s)
            <?php $k = $s->keyword ?>
            @if ($k == 'corporate-identity' or
                 $k == 'editorial-design' or 
                 $k == 'social-network')
              <li role="presentation" class="{!! ($s->keyword == $tabActive) ? 'active' : '' !!}">
                <a href="{!! URL::to('/portfolio/'.$s->keyword) !!}">{!! $s->name !!}</a>
              </li>
            @else
              <li role="presentation" class="{!! ($s->keyword == $tabActive) ? 'active' : '' !!}">
                <a href="{!! URL::to('/portfolio/'.$s->keyword.'/viewer') !!}">{!! $s->name !!}</a>
              </li>
            @endif
            <?php ++$i ?>
          @endforeach
        @endif
      </ul>
    </div>
  </div>
</div>
<div class="container-fluid app-viewer">
  <div class="row">
    <section>
      <div id="jumbotron" class="app-jumbotron tab-content col-xs-12 no-side-padding">
        <div id="main-carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="{!! asset($client->cover_page_link($submenu->keyword)) !!}" class="app-cover-page" alt="{!! $client->name !!}" title="{!! $client->name !!}">
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <section>
        <div class="app-description-container col-xs-6">
          <header>
            <div class="header col-xs-12 no-side-padding">
              <h1 class="app-title">{!! $client->name !!}</h1>
              <h2 class="app-subtitle">{!! $submenu->name !!}</h2>
            </div>
          </header>
          <article>
            <div class="content col-xs-12 no-side-padding">
              <p class="app-description">{!! $client->description($submenu->keyword) !!}</p>
            </div>
          </article>
        </div>
        <div class="app-tools col-xs-6">
          <div class="col-xs-12 no-side-padding">
            <div class="pull-right">
              <a id="prev-item" href="#jumbotron" data-item="" class="app-prev-item app-button btn btn-default anchorLink disabled">
                <span class="fa fa-arrow-left"></span>
              </a>
              <a id="next-item" href="#jumbotron" data-item="" class="app-next-item app-button btn btn-default anchorLink disabled">
                <span class="fa fa-arrow-right"></span>
              </a>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script type="text/javascript">
  var __current_url   = "{!! URL::to('/') !!}",
      __submenu       = "{!! $submenu->keyword !!}",
      __current_item  = "{!! $client->keyword !!}";
  </script>
  <script type="text/javascript" src="{!! asset('public/assets/js/site/portfolio/viewer/index.js') !!}"></script>
@endsection