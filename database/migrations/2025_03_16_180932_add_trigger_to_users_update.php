<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("
        CREATE TRIGGER after_user_update
        AFTER UPDATE ON users
        FOR EACH ROW
        BEGIN
            IF OLD.role = 'user' AND NEW.role <> 'user' THEN
                DELETE FROM anggota WHERE user_id = OLD.id;
            END IF;
        END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS after_user_update;");
    }
};
