<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Menu;
use App\Submenu;

class CreateSubmenuesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('submenues', function(Blueprint $table) {
      $table->increments('id');
      $table->string('keyword', 32)->unique();
      $table->string('name');
      $table->string('url')->nullable();
      $table->integer('submenuable_id')->unsigned();
      $table->string('submenuable_type');
      $table->timestamps();
    });

    $menu = Menu::whereKeyword('main');

    if ($menu->count() == 1) {
      $menu = $menu->first();
      $submenues = config('init.submenues');

      foreach ($submenues as $keyword => $attr) {
        $menu->submenues()->create(['keyword' => $keyword, 'name' => $attr['name'], 'url' => empty($attr['url']) ? null : $attr['url']]);
      }

      $menu = Submenu::whereName('Portafolio');

      if ($menu->count() == 1) {
        $menu = $menu->first();
        $submenues = config('init.portfolio');

        foreach ($submenues as $keyword => $attr) {
          $menu->submenues()->create(['keyword' => $keyword, 'name' => $attr['name'], 'url' => empty($attr['url']) ? null : $attr['url']]);
        }
      }
    }
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('submenues');
  }
}
