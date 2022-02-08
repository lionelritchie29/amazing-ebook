<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->string('account_id', 15);
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('gender_id');
            $table->string('first_name', 25);
            $table->string('middle_name', 25)->nullable();
            $table->string('last_name', 25);
            $table->string('email', 50);
            $table->string('password', 50);
            $table->string('display_picture_link');
            $table->date('modified_at')->nullable();
            $table->string('modified_by')->nullable();

            
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->foreign('gender_id')->references('gender_id')->on('genders');
            $table->primary('account_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
