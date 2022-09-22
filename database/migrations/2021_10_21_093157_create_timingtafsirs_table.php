<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimingtafsirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timingtafsirs', function (Blueprint $table) {
            $table->id();
            $table->text('tafsirtime1')->nullable();
            $table->text('tafsirtime2')->nullable();
            $table->text('tafsirtime3')->nullable();
            $table->text('tafsirtime4')->nullable();
            $table->text('tafsirtime5')->nullable();
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
        Schema::dropIfExists('timingtafsirs');
    }
}
