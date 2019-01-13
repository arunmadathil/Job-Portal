<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('job_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description')->unique();
            $table->tinyInteger('experience')->default(0);
            $table->integer('country_id');
            $table->integer('state_id');
            $table->string('city');
            $table->string('salary');
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
        Schema::dropIfExists('password_resets');
        
    }
}
