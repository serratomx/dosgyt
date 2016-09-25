@extends('site.layouts.main')
@section('title', 'Nuestros clientes')
@section('content')
<div class="container app-our-clients">
  <div class="row">
    <div class="col-xs-12 no-side-padding custom-padding-1">
      <header>
        <div class="header">
          <h1 class="title">Nuestros clientes</h1>
        </div>
      </header>
    </div>
    <div class="our-clients-container col-xs-12 no-side-padding">
      <?php $i = 0; ?>
      @foreach ($clients as $client)
        <div class="col-xs-3 no-side-padding">
          <div id="client-container-{!! $i !!}" class="client-container hidden col-xs-12 no-side-padding text-center hvr-grow">
            <div class="client-image inline-block" style="background-image: url({!! asset($client->logo_link) !!});" title="Ver {!! $client->name !!}"></div>
          </div>
        </div>   
        <?php ++$i ?>
      @endforeach
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script type="text/javascript" src="{!! asset('public'.elixir('assets/js/site/ourClients/index.js')) !!}"></script>
@endsection