<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('lowongans', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->text('description');
      $table->integer('slot');
      $table->date('open');
      $table->date('closed');
      $table->enum('status', ['available', 'unavailable', 'upcoming']);
      $table->text('image');
      $table->unsignedBigInteger('id_perusahaan');
      $table->timestamps();

      $table->foreign('id_perusahaan')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('lowongans');
  }
};
