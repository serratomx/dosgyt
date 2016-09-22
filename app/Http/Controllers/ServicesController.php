<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Submenu;

class ServicesController extends Controller
{
  private $params = [];

  public function index() {
    $this->params['services'] = Submenu::whereKeyword('services')->first();
    return view('site.services.index')->with($this->params);
  }
}
