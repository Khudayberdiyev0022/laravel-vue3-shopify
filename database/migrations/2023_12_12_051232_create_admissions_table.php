<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void
  {
    Schema::create('admissions', function (Blueprint $table) {
      $table->id();
      $table->string('year', 4);
      $table->string('start_date');
      $table->string('end_date');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('admissions');
  }
};
