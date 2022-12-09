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
            $table->string('name')->nullable();;
            $table->string('pseudo')->unique();
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('work')->nullable();
            $table->timestamp('birth')->nullable();
            $table->string('sex')->nullable();
            $table->string('role')->default('user');
            $table->string('image')->nullable();
            $table->string('online')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
