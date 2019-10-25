<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaultItemsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('vault_items', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('title');
      $table->bigInteger('users_id');
      $table->string('vault_type');
      $table->longText('data');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::dropIfExists('vault_items');
  }
}
