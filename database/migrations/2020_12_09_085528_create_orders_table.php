<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();


            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->string('country');
            $table->string('street_address');
            $table->string('postcode_zip');
            $table->string('town_city');
            $table->string('email')->nullable();
            $table->string('phone', 20)->nullable();

            $table->decimal("total",14,2);
            $table->string("payment_method",20);
            $table->string("shipping_method",20);

            $table->string('order_code')->unique();

            $table->boolean("is_paid")->default(false);
            $table->tinyInteger("status")->default(0);

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
        Schema::dropIfExists('orders');
    }
}
