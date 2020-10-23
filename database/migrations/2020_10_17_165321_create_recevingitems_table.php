<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecevingitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recevingitems', function (Blueprint $table) {
            $table->id();
            $table->integer('receiving_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->decimal('cost_price',15, 2);
			$table->integer('quantity');
			$table->decimal('total_cost',15, 2);
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
        Schema::dropIfExists('recevingitems');
    }
}
