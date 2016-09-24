<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Submenu;

class OurClientsController extends Controller
{
  private $params = [];

  public function index() {
    $submenu = Submenu::whereKeyword('our-clients');

    if ($submenu->count() == 1) {
      $this->params['submenu'] = $submenu = $submenu->first();
      $this->params['clients'] = $submenu->clients()->orderBy('order_priority', 'ASC')->get();
    }
    return view('site.ourClients.index')->with($this->params);
  }
}
