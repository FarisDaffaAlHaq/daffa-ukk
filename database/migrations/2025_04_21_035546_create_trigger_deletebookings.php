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
        CREATE TRIGGER `hapusbooking` 
        AFTER INSERT ON `detail_kamar_orders` 
        FOR EACH ROW 
        BEGIN 
        UPDATE kamars
        INNER JOIN bookings ON kamars.id = bookings.kamar_id SET kamars.status = "tidak_tersedia"
        WHERE kamars.id = bookings.kamar_id;
        DELETE FROM bookings 
        WHERE bookings.user_id = user_id; 
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
