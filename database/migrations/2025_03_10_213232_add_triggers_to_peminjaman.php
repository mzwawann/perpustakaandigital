<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTriggersToPeminjaman extends Migration
{
    public function up()
    {
        // Trigger untuk mengurangi stock buku saat status menjadi 'dipinjam'
        DB::unprepared('
            CREATE TRIGGER kurangi_stock_saat_dipinjam
            AFTER UPDATE ON peminjamen
            FOR EACH ROW
            BEGIN
                IF NEW.status = "dipinjam" AND OLD.status = "menunggu konfirmasi" THEN
                    UPDATE bukus 
                    SET stock = stock - 1 
                    WHERE id = NEW.buku_id;
                END IF;
            END
        ');

        // Trigger untuk menambah stock buku saat status menjadi 'dikembalikan'
        DB::unprepared('
            CREATE TRIGGER tambah_stock_saat_dikembalikan
            AFTER UPDATE ON peminjamen
            FOR EACH ROW
            BEGIN
                IF NEW.status = "dikembalikan" AND OLD.status = "dipinjam" THEN
                    UPDATE bukus 
                    SET stock = stock + 1 
                    WHERE id = NEW.buku_id;
                END IF;
            END
        ');
    }

    public function down()
    {
        // Hapus trigger jika rollback
        DB::unprepared('DROP TRIGGER IF EXISTS kurangi_stock_saat_dipinjam');
        DB::unprepared('DROP TRIGGER IF EXISTS tambah_stock_saat_dikembalikan');
    }
};
