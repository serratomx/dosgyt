<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $table = 'clients';

  protected $fillable = [
    'keyword',
    'name',
    'logo_path',
    'logo_url'
  ];

  protected $hidden = [
    'id'
  ];

  public function submenues() {
    return $this->belongsToMany('App\Submenu', 'client_submenu')->withPivot(['order_priority', 'description', 'cover_page_path', 'cover_page_url'])->withTimestamps();
  }

  public function getLogoLinkAttribute() {
    return $this->attributes['logo_link'] = $this->logo_path.$this->logo_url;
  }

  public function cover_page_link($submenu_keyword) {
    $pivot = $this->submenues()->where(['keyword' => $submenu_keyword])->first()->pivot;
    return $pivot->cover_page_path . $pivot->cover_page_url;
  }

  public function description($submenu_keyword) {
    $pivot = $this->submenues()->where(['keyword' => $submenu_keyword])->first()->pivot;
    return $pivot->description;
  }
}
