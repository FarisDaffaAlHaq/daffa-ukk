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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->integer('nokamar')->unique();
            $table->integer('tipe_kamars_id');
            $table->integer('jumlahorangperkamar');
            // $table->string('status');
            $table->enum('status',['tersedia','tidak_tersedia']);
            $table->integer('hargakamarpermalam');
            $table->string('image');
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
        Schema::dropIfExists('kamars');
    }
};
