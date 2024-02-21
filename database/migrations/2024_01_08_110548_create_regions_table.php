<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void
  {
    Schema::create('regions', function (Blueprint $table) {
      $table->id();
      $table->jsonb('title');
      $table->timestamps();
    });
    Schema::create('cities', function (Blueprint $table) {
      $table->id();
      $table->foreignId('region_id')->index()->constrained()->onDelete('cascade');
      $table->jsonb('title');
      $table->timestamps();
    });
//    Schema::create('districts', function (Blueprint $table) {
//      $table->id();
//      $table->foreignId('city_id')->index()->constrained()->onDelete('cascade');
//      $table->jsonb('title');
//      $table->timestamps();
//    });
  }

  public function down(): void
  {
    Schema::dropIfExists('regions');
    Schema::dropIfExists('cities');
    Schema::dropIfExists('districts');
  }
};
