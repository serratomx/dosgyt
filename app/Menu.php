<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $table = 'menues';

  protected $fillable = [
    'keyword'
  ];

  public function submenues() {
    return $this->morphMany('App\Submenu', 'submenuable');
  }
}
