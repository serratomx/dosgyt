<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Log;
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
      $table->string('keyword', 32)->unique();
      $table->string('name');
      $table->string('logo_path')->nullable();
      $table->string('logo_url')->nullable();
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
      $table->text('description')->nullable();
      $table->string('cover_page_path')->nullable();
      $table->string('cover_page_url')->nullable();
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

        Log::info('Client: '.json_encode($client->name));

        foreach ($submenues as $submenu => $attr) {
          $submenu = Submenu::whereKeyword($submenu);

          if ($submenu->count() == 1) {
            $submenu = $submenu->first();

            $client->submenues()->attach([
              $submenu->id => $attr
            ]);

            Log::info('Después: '.json_encode($client->submenues));
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
