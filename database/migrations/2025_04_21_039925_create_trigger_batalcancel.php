<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `batalcancel` AFTER DELETE ON `detail_kamar_orders` 
        FOR EACH ROW 
        BEGIN INSERT INTO detail_kamar_cancels (detail_kamar_orders_id,kamar_orders_id, kamars_id, tanggal_checkin, tanggal_checkout, jumlah_penginap, totalharga, lama_menginap, dp_dibayar, bookings_id, user_id, created_at, updated_at)VALUES (OLD.id,OLD.kamar_orders_id, OLD.kamars_id, OLD.tanggal_checkin,OLD.tanggal_checkout,OLD.jumlah_penginap,OLD.totalharga,OLD.lama_menginap,OLD.dp_dibayar,OLD.bookings_id,OLD.user_id,OLD.created_at,OLD.updated_at); 
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('trigger_deletebookings');
    }
};
