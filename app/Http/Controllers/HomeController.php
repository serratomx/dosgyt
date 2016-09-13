<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Route;

class HomeController extends Controller
{
  private $params = [];
  public function index(){
    $this->params['navbarFixed'] = false;
    return view('site.home.index')->with($this->params);
  }
}
