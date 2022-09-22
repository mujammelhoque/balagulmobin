<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurahtafsirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surahtafsirs', function (Blueprint $table) {
            $table->id();
            $table->integer('nav_id')->nullable();
            $table->string('series', 150)->nullable();
            $table->integer('series_serial')->nullable();
            $table->date('dt')->nullable();
            $table->integer('surah_no')->nullable();
            $table->string('surah_name', 150)->nullable();
            $table->string('description')->nullable();
            $table->string('class_rec', 150)->nullable();
            $table->string('class_rec_url')->nullable();
            $table->string('class_note', 150)->nullable();
            $table->string('class_note_url')->nullable();
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
        Schema::dropIfExists('surahtafsirs');
    }
}
