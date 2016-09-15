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

  public function submenues() {
    return $this->belongsToMany('App\Submenu', 'client_submenu')->withPivot(['order_priority', 'description', 'cover_page_path', 'cover_page_url'])->withTimestamps();
  }

  public function getCoverPageLinkAttribute() {
    return $this->attributes['cover_page_link'] = $this->cover_page_image_path.$this->cover_page_image_url;
  }

  public function getLogoLinkAttribute() {
    return $this->attributes['logo_link'] = $this->logo_path.$this->logo_url;
  }
}