<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyerRfqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_rfqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rfq_no');
            $table->string('email');
            $table->string('phonenumber');
            $table->string('message');
            $table->string('buyer_id');
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
        Schema::dropIfExists('buyer_rfqs');
    }
}
