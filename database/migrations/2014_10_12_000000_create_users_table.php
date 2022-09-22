<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('username',150)->nullable();
            $table->string('age',100)->nullable();
            $table->string('gender',100)->nullable();
            $table->string('mobile',20)->nullable();
            $table->string('address')->nullable();
            $table->string('education')->nullable();
            $table->string('profession')->nullable();
            $table->string('prev_experi')->nullable();
            $table->integer('is_admin')->default(0)->nullable();
            $table->string('is_student')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
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
        Schema::dropIfExists('users');
    }
}
