<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStkResponsesTable extends Migration
{
    public function up()
    {
        Schema::create('stk_responses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('receipt')->nullable();
            $table->string('checkout_request')->nullable();
            $table->string('phone')->nullable();
            $table->string('amount')->nullable();
            $table->string('transaction_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
