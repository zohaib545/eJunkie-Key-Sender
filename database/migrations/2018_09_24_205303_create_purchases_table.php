<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bundle_id');
            $table->integer('package_id');
            $table->string('amount');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('transaction_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('bundle_name');
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
        Schema::dropIfExists('purchases');
    }
}
