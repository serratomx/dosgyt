<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Menu;

class CreateMenuesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('menues', function (Blueprint $table) {
      $table->increments('id');
      $table->string('keyword', 32)->unique();
      $table->timestamps();
    });

    Menu::create([
      'keyword' => 'main'
    ]);
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('menues');
  }
}
