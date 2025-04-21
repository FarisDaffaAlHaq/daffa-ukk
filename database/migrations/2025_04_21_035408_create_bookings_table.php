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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('kamar_id');
            // $table->integer('kodebooking');
            $table->integer('jumlah_penginap');
            $table->date('rencanacheckin');
            $table->date('rencanacheckout');
            $table->integer("totalharga");
            $table->integer("lama_menginap");
            $table->integer("dp_dibayar")->nullable();
            $table->softDeletes();
            // $table->enum('status',['confirmed','uncorfirmed','done'])->default('confirmed');
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
        Schema::dropIfExists('bookings');
    }
};
