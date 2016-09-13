<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Submenu;

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
}
