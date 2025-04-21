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
        CREATE TRIGGER `changestatusguest` AFTER INSERT ON `guest_bookings` FOR EACH ROW BEGIN UPDATE kamars INNER JOIN guest_bookings ON kamars.id = guest_bookings.kamar_id SET kamars.status = "tidak_tersedia" WHERE kamars.id = guest_bookings.kamar_id; END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('changestatusguest');
    }
};
