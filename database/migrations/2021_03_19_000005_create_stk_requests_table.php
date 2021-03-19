<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStkRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('stk_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('request');
            $table->string('msisdn');
            $table->decimal('amount', 15, 2)->nullable();
            $table->integer('paid')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
