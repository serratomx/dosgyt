<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $table = 'clients';

  protected $fillable = [
    'keyword',
    'name',
    'description',
    'logo_path',
    'logo_url',
    'cover_page_image_path',
    'cover_page_image_url',
    'is_our_client'
  ];

  public function submenues() {
    return $this->belongsToMany('App\Submenu', 'client_submenu')->withPivot(['order_priority'])->withTimestamps();
  }

  public function getCoverPageLinkAttribute() {
    return $this->attributes['cover_page_link'] = $this->cover_page_image_path.$this->cover_page_image_url;
  }
}
