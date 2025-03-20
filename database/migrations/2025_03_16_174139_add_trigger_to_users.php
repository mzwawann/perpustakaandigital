<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("
            CREATE TRIGGER after_user_insert
            AFTER INSERT ON users
            FOR EACH ROW
            BEGIN
                IF NEW.role = 'anggota' THEN
                    INSERT INTO anggota (uid, nama_lengkap, email, telepon, alamat, created_at, updated_at)
                    VALUES (NEW.id, NEW.name, NEW.email, NEW.telepon, NEW.alamat, NOW(), NOW());
                END IF;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS after_user_insert;");
    }
};
