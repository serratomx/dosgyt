@extends('site.layouts.main')
@section('title', 'Contacto')
@section('content')
<div class="container app-contact">
  <div class="row">
    <div class="col-xs-12 no-side-padding">
      <header>
        <div class="header">
          <h1 class="title">Contacto</h1>
        </div>
      </header>
    </div>
    <div class="contact-form-container col-xs-12 no-side-padding">
      <div class="header col-xs-12 no-side-padding">
        <div class="col-xs-4 col-xs-offset-4">
          <h2 class="title">Te ayudamos a materializar<br/>tu sueño</h2>
          <h3 class="subtitle">¡Dejanos tu mensaje!</h3>
        </div>
      </div>
      <div class="col-xs-12 no-side-padding">
        <div class="col-xs-10 col-xs-offset-1">
          {!! Form::open(['route' => 'site.contact.send', 'id' => 'contact-form', 'class' => 'contact-form']) !!}
            <div class="col-xs-12">
              <div class="col-xs-6">
                <div class="form-group">
                  {!! Form::label('contact[name]', 'Nombre') !!}
                  {!! Form::text('contact[name]', null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  {!! Form::label('contact[company]', 'Empresa') !!}
                  {!! Form::text('contact[company]', null, ['class' => 'form-control']) !!}
                </div>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="col-xs-6">
                <div class="form-group">
                  {!! Form::label('contact[telephone]', 'Teléfono') !!}
                  {!! Form::text('contact[telephone]', null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  {!! Form::label('contact[email]', 'E-mail') !!}
                  {!! Form::text('contact[email]', null, ['class' => 'form-control']) !!}
                </div>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="col-xs-6">
                <div class="form-group">
                  {!! Form::label('contact[msg]', 'Mensaje') !!}
                  {!! Form::textarea('contact[msg]', null, ['class' => 'form-control', 'rows' => 10]) !!}
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <button class="btn btn-primary pull-right">Enviar</button>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="contact-data">
                  <p>Contacto</p>
                  <p>
                    <a href="mailto:contacto@dosgyt.com" class="link">
                      <span class="fa fa-envelope-o mail-icon"></span> contacto@dosgyt.com
                    </a>
                  </p>
                  <ul class="phones-list">
                    <li>
                      <span class="fa fa-phone phone-icon"></span> 442 435 3978
                    </li>
                    <li>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;442 247 4775
                    </li>
                    <li>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;442 343 3773
                    </li>
                  </ul>
                  <p>
                    <a target="__blank" href="https://www.facebook.com/dosgyt/" class="link">
                      <span class="fa fa-facebook-square fb-icon"></span> 2G&T
                    </a>
                  </p>
                  <p>
                    <a target="__blank" href="https://www.instagram.com/dosgyt_solucionesgraficas/" class="link">
                      <span class="fa fa-instagram insta-icon"></span> dosgyt_solucionesgraficas
                    </a>
                  </p>
                </div>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script type="text/javascript" src="{!! asset('public'.elixir('assets/js/site/contact/index.js')) !!}"></script>
@endsection