<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->foreignId('customer_id')->constrained('customers');
            $table->integer('delivery_men_id')->nullable();
            $table->string("name", 100);
            $table->string("email", 500);
            $table->string("phone", 20);
            $table->double("amount");
            $table->string("status", 10)->default('pending');
            $table->string("payment_status", 10)->default('cod');
            $table->text("address");
            $table->string("transaction_id");
            $table->string("currency", 10)->nullable();
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
};
