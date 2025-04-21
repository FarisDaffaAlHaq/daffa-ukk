<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_activities', function (Blueprint $table) {
            $table->id();
            $table->string('msglogs'); // Message of log here!..
            $table->unsignedBigInteger('user_id')->nullable();// User id if you want to log by user
            $table->string('action'); // url action example "/student"
            $table->string('status'); // if "true" it will be "success", if "false" it will be "failed".
            $table->string('useragent'); // show the user_agent of your device agent
            $table->string('currurl'); // full url of logging
            $table->string('method'); // method request to currurl by logging
            $table->string('connection'); // default : "keep-alive"
            $table->string('date'); // date of log (realtime), it will be unaccurated time!.
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
        Schema::dropIfExists('log_activities');
    }
}
