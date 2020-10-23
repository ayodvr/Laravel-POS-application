<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecevingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recevings', function (Blueprint $table) {
            $table->id();
            $table->integer('supplier_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned();
			$table->string('payment_type', 15)->nullable();
			$table->string('comments', 255)->nullable();
            $table->tinyInteger('status');//status 1 means close status 0 means open
            $table->decimal('total', 9, 2);
            $table->decimal('payment', 9, 2);
            $table->decimal('dues', 9, 2);
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
        Schema::dropIfExists('recevings');
    }
}
