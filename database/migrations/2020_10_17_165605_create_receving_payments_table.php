<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecevingPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receving_payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('payment', 12, 2);
            $table->string('payment_type');
            $table->string('comments')->nullable();
            $table->decimal('dues', 12, 2);
            $table->integer('user_id')->unsigned();
            $table->integer('receiving_id')->unsigned();
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
        Schema::dropIfExists('receving_payments');
    }
}
