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
        CREATE TRIGGER `kembalikan status` 
        AFTER INSERT ON `detail_kamar_cancels`
        FOR EACH ROW 
        BEGIN 
        UPDATE kamars INNER JOIN detail_kamar_cancels ON kamars.id = detail_kamar_cancels.kamars_id SET kamars.status = "tersedia" 
        WHERE kamars.id = detail_kamar_cancels.kamars_id; 
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
