<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Submenu;
use App\Client;

class PortfolioController extends Controller
{
  private $params = [];

  public function index($submenu = null) {
    $portfolio = Submenu::whereKeyword('portfolio')->first();
    $firstSubmenu = $portfolio->submenues->first();
    $this->params['title'] = $portfolio->name;

    if ($firstSubmenu) {
      $this->params['title'] = $firstSubmenu->name;
      $this->params['tabActive'] = $firstSubmenu->keyword;

      if (!is_null($submenu)) {
        $this->params['tabActive'] = $submenu;
        $submenu = Submenu::whereKeyword($submenu)->first();
        $this->params['title'] = $submenu->name;
      }
    }

    return view('site.portfolio.index')->with($this->params);
  }

  public function viewer($submenu, $client = null) {
    $this->params['tabActive'] = $submenu;
    $this->params['submenu'] = Submenu::whereKeyword($submenu)->first();
    $this->params['title'] = $this->params['submenu']->name;

    if (!is_null($client)) {
      $this->params['client'] = Client::whereKeyword($client)->first();
    } else {
      $this->params['client'] = $this->params['submenu']->clients->first();
    }

    return view('site.portfolio.viewer.index')->with($this->params);
  }

  public function json_for_viewer($submenu, $client) {
    $resp = [
      'status' => 'ERROR_CONNECTION',
      'msg'    => 'Existe un error en la conexión <br/>¡Por favor, intente más tarde!'
    ];

    $submenu = Submenu::whereKeyword($submenu)->first();
    $client = Client::whereKeyword($client)->first();

    if ($submenu and $client) {
      $pivot = $client->submenues()->where(['keyword' => $submenu->keyword])->first()->pivot;
      
      if ($pivot) {
        $prev_item = $submenu->clients()->where(['order_priority' => $pivot->order_priority - 1])->first();
        $next_item = $submenu->clients()->where(['order_priority' => $pivot->order_priority + 1])->first();

        $resp['data'] = [
          'submenu' => [
            'keyword' => $submenu->keyword,
            'name'    => $submenu->name,
          ],
          'current_item' => [
            'keyword'         => $client->keyword,
            'name'            => $client->name,
          'cover_page_link' => asset($pivot->cover_page_path.$pivot->cover_page_url),
            'description'     => $pivot->description,
            'order_priority'  => $pivot->order_priority
          ],
          'prev_item' => [
            'keyword' => ($prev_item ? $prev_item->keyword : null)
          ],
          'next_item' => [
            'keyword' => ($next_item ? $next_item->keyword : null)
          ]
        ];

        $resp['status'] = 'SUCCESS';
        $resp['msg'] = 'Datos obtenidos de forma exitosa.';
      } else {
        $resp['status'] = 'VALIDATION_ERROR';
        $resp['msg'] = 'Error de validación<br/>¡Los datos obtenidos son incorrectos!';
      }
    } else {
      $resp['status'] = 'VALIDATION_ERROR';
      $resp['msg'] = 'Error de validación<br/>¡Los datos obtenidos son incorrectos!';
    }

    return response()->json($resp);
  }
}
