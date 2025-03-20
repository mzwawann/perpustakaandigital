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
        Schema::table('peminjamen', function (Blueprint $table) {
            $table->foreignId('buku_id')->after('judul_buku')->nullable()->constrained('bukus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjamen', function (Blueprint $table) {
            //
        });
    }
};
