<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->decimal('unit_price', 12, 2);
            $table->text('description');
            $table->decimal('payment', 12, 2);
            $table->decimal('dues', 12, 2);
            $table->decimal('total', 12, 2);
            $table->string('payment_type');
            $table->integer('user_id')->unsigned();
            $table->integer('expense_category_id')->unsigned();
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
        Schema::dropIfExists('expenses');
    }
}
