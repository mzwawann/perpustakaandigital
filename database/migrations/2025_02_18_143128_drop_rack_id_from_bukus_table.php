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
        Schema::table('bukus', function (Blueprint $table) {
            $table->dropForeign(['rack_id']); // Hapus foreign key
            $table->dropColumn('rack_id'); // Hapus kolom
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bukus', function (Blueprint $table) {
            $table->foreignId('rack_id')->nullable()->constrained('racks')->onDelete('set null');
        });
    }
};
