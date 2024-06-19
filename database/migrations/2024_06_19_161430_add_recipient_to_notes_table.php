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
    Schema::table('notes', function (Blueprint $table) {
      $table->string('recipient')->nullable()->after('user_id');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('notes', function (Blueprint $table) {
      $table->dropColumn('recipient');
    });
  }
};
