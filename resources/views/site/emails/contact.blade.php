<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Solicitud de contacto | 2G&T</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&subset=latin-ext" rel="stylesheet">
</head>
<body style="font-family: 'Roboto', helvetica, arial, sans-serif;margin:0;background-color: #F5F5F5;font-size:16px;">
<div style="display:block;margin:auto;width:996px;background-color:#FFFFFF;">
  <div style="width:92%;display:block;margin:auto;padding:60px 25px;">
    <div style="width:100%;display:inline-block;margin:auto;text-align:center;">
      <img src="{!! asset('public/assets/img/logo-dosgyt.png') !!}" alt="Logo 2G&T" title="Logo 2G&T" style="display:inline-block;margin-bottom:30px;" />
    </div>
    <div style="width:100%;display:inline-block;margin:auto;">
      <div style="text-align:center;margin-bottom:45px;">
        <h1 style="font-weight:bold;">Solicitud de contacto</h1>
        <h4 style="font-weight:normal;">Un visitante ha generado una solicitud de contacto con los siguientes datos: </h4>
      </div>
      <p><b>Nombre:</b> {{ $contact['name'] }}</p>
      <p><b>Empresa:</b> {{ $contact['company'] }}</p>
      <p><b>Teléfono:</b> {{ $contact['telephone'] }}</p>
      <p><b>Correo electrónico:</b> <a href="mailto:{{ $contact['email'] }}" style="color:rgb(226,21,106);text-decoration:none;">{{ $contact['email'] }}</a></p>
      <p><b>Su mensaje:</b> {{ $contact['msg'] }}</p>
    </div>
  </div>
  <div style="width:100%;display:inline-block;margin:auto;min-height:90px;background-color: #fff;border-top:4px solid rgb(226,21,106);">
    <p style="text-align:center;margin-top:25px;">Copyright &copy; {!! date('Y') !!} | Todos los derechos reservados.</p>
  </div>
</div>
</body>
</html>