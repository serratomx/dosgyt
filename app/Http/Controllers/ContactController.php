<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Mail;

class ContactController extends Controller
{
  protected $params = [];

  public function index() {
    return view('site.contact.index');
  }

  public function send(Request $request) {
    $res = [
      'status' => 'ERROR_CONNECTION',
      'msg'    => 'Existe un error en la conexión <br/>¡Por favor, intente más tarde!'
    ];

    $contact = $request->input('contact');

    if (isset($contact) and !empty($contact)) {

      $validation = Validator::make($contact, [
        'name'      => 'required|max:60',
        'company'   => 'required|max:60',
        'telephone' => 'required|regex:/^[0-9]{10,10}$/',
        'email'     => 'required|email|max:250',
        'msg'       => 'required|max:2048'
      ]);

      if ($validation->fails()) {
        $res['status'] = 'VALIDATION_ERROR';
        $res['msg'] = 'Error de validación<br/>¡Los datos introducidos son incorrectos!';
      } else {
        $mail_sent = Mail::send('site.emails.contact', ['contact' => $contact], function ($m) use ($contact) {
          $m->from('dosgyt@dosgyt.com', '2G&T Server');
          $m->replyTo($contact['email'], $contact['name']);
          $m->to('contacto@dosgyt.com', 'Contacto 2G&T');
          $m->subject('[Contacto] '.$contact['name'].' | 2G&T');
        });

        if ($mail_sent) {
          $res['status'] = 'SUCCESS';
          $res['msg'] = '¡Solicitud de contacto enviada!';
        }
      } 
    } 
    echo json_encode($res);
  }
}
