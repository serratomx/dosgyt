<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
  protected $table = 'submenues';

  protected $fillable = [
    'keyword',
    'name',
    'url',
    'submenuable_id',
    'submenuable_type'
  ];

  public function submenuable() {
    return $this->morphTo();
  }

  public function submenues() {
    return $this->morphMany('App\Submenu', 'submenuable');
  }

  public function clients() {
    return $this->belongsToMany('App\Client', 'client_submenu')->withPivot(['order_priority', 'description', 'cover_page_path', 'cover_page_url'])->withTimestamps();
  }

  public function services() {
    return $this->belongsToMany('App\Service', 'service_submenu')->withPivot(['order_priority', 'description'])->withTimestamps();
  }
}
