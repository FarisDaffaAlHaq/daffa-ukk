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
        Schema::create('detail_kamar_cancels', function (Blueprint $table) {
            $table->id();
            $table->integer("kamar_orders_id")->nullable();
            $table->integer("detail_kamar_orders_id")->nullable();
            $table->integer("kamars_id")->nullable();
            $table->date('tanggal_checkin')->nullable();
            $table->date('tanggal_checkout')->nullable();
            $table->integer("jumlah_penginap")->nullable();
            $table->integer("totalharga")->nullable();
            $table->integer("lama_menginap")->nullable();
            $table->integer("dp_dibayar")->nullable();
            $table->integer("bookings_id")->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('detail_kamar_cancels');
    }
};
