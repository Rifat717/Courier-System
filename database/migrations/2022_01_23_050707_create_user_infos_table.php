<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_type_id');
            $table->string('user_name');
            $table->string('user_password');
            $table->string('user_full_name');
            $table->string('user_phone');
            $table->string('user_email');
            $table->string('user_address');
            $table->string('user_company_info');
            $table->string('user_company_address');
            $table->string('user_company_phone');
            $table->string('user_company_email');
            $table->string('user_status');
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
        Schema::dropIfExists('user_infos');
    }
}
