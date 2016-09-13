<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Client;
use App\Submenu;

class CreateClientsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('clients', function(Blueprint $table) {
      $table->increments('id');
      $table->string('keyword', 32);
      $table->string('name');
      $table->text('description');
      $table->string('logo_path')->nullable();
      $table->string('logo_url')->nullable();
      $table->string('cover_page_image_path')->nullable();
      $table->string('cover_page_image_url')->nullable();
      $table->boolean('is_our_client');
      $table->timestamps();
    });

    Schema::create('client_submenu', function(Blueprint $table) {
      /**
       * Client/Submenu - Fields
       * ============================================================= //
       */
      $table->integer('client_id')->unsigned();
      $table->integer('submenu_id')->unsigned();
      $table->integer('order_priority');
      $table->timestamps();
      
      /**
       * Client/Submenu - Foreign Keys
       * ============================================================= //
       */
      $table->foreign('client_id')
            ->references('id')->on('clients')
            ->onDelete('cascade');
            
      $table->foreign('submenu_id')
            ->references('id')->on('submenues')
            ->onDelete('cascade');
    });

    $clients = config('init.clients');

    foreach ($clients as $keyword => $attr) {
      $attr['keyword'] = $keyword;
      $client = Client::create($attr);
    }

    $client_submenu = config('init.client_submenu');

    foreach ($client_submenu as $client => $submenues) {
      $client = Client::whereKeyword($client);

      if ($client->count() == 1) {
        $client = $client->first();

        foreach ($submenues as $submenu => $order_priority) {
          $submenu = Submenu::whereKeyword($submenu);

          if ($submenu->count() == 1) {
            $submenu = $submenu->first();

            $client->submenues()->attach([$submenu->id => ['order_priority' => $order_priority]]);
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
    Schema::drop('client_submenu');
    Schema::drop('clients');
  }
}
