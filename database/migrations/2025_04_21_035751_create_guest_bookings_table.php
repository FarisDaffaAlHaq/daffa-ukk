<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('guest_bookings', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("nomortelpon");
            $table->string("email");
            $table->integer('kamar_id');
            $table->integer('kodebooking')->nullable();
            // $table->integer('hargakamar')->nullable();
            // $table->integer('kodeupdate')->nullable();
            // $table->integer('kodedelete')->nullable();
            // $table->string('konfirmasi')->nullable();
            $table->integer('jumlah_penginap');
            $table->date('rencanacheckin');
            $table->date('rencanacheckout');
            // $table->integer("totalharga");
            $table->integer("lama_menginap");
            $table->integer("dp_dibayar")->nullable();
            // $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_bookings');
    }
};
