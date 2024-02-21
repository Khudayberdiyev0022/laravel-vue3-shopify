<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void
  {
    Schema::create('partisans', function (Blueprint $table) {
      $table->id();
      $table->jsonb('title');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('partisans');
  }
};
