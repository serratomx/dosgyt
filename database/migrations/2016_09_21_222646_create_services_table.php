<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Submenu;
use App\Service;

class CreateServicesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('services', function(Blueprint $table) {
      $table->increments('id');
      $table->string('keyword', 32)->unique();
      $table->string('name');
      $table->timestamps();
    });

    Schema::create('service_submenu', function(Blueprint $table){
      /**
       * Services/Submenu - Fields
       * ============================================================= //
       */
      $table->integer('service_id')->unsigned();
      $table->integer('submenu_id')->unsigned();
      $table->integer('order_priority');
      $table->text('description')->nullable();
      $table->timestamps();

      /**
       * Services/Submenu - Foreign Keys
       * ============================================================= //
       */
      $table->foreign('service_id')
            ->references('id')->on('services')
            ->onDelete('cascade');
            
      $table->foreign('submenu_id')
            ->references('id')->on('submenues')
            ->onDelete('cascade');
    });

    $services = config('init.services_list');

    foreach ($services as $keyword => $attr) {
      $attr['keyword'] = $keyword;
      $service = Service::create($attr);
    }

    $service_submenu = config('init.service_submenu');

    foreach ($service_submenu as $service => $submenues) {
      $service = Service::whereKeyword($service);

      if ($service->count() == 1) {
        $service = $service->first();

        foreach ($submenues as $submenu => $attr) {
          $submenu = Submenu::whereKeyword($submenu);

          if ($submenu->count() == 1) {
            $submenu = $submenu->first();

            $service->submenues()->attach([
              $submenu->id => $attr
            ]);
          }
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
    Schema::drop('service_submenu');
    Schema::drop('services');
  }
}
