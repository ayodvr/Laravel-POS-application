<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('user_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_usertype');
            $table->string('address');
            $table->string('phone');
            $table->string('city');
            $table->string('photo');
            $table->string('slug');
            $table->string('date_of_birth');
            $table->string('date_employed');
            $table->string('department');       
            $table->string('experience');
            $table->string('status');
            $table->SoftDeletes(); 
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
        Schema::dropIfExists('staffs');
    }
}
