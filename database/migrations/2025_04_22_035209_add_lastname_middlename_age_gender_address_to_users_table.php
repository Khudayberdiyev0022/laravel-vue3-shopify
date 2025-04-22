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
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->nullable()->after('name');
            $table->string('middlename')->nullable()->after('lastname');
            $table->integer('age')->nullable()->after('middlename');
            $table->tinyInteger('gender')->default(false)->after('age');
            $table->string('address')->nullable()->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['lastname', 'middlename', 'age', 'gender', 'address']);
        });
    }
};
