<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $table = 'services';

  protected $fillable = [
    'keyword',
    'name'
  ];

  protected $hidden = [
    'id'
  ];

  public function submenues() {
    return $this->belongsToMany('App\Submenu', 'service_submenu')->withPivot(['order_priority', 'description'])->withTimestamps();
  } 
}
