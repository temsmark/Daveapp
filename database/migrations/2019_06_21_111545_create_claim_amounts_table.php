<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_amounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unit_id');
            $table->integer('claim_id');
            $table->double('service')->nullable()->unsigned();
            $table->double('marking')->nullable()->unsigned();
            $table->double('transport')->nullable()->unsigned();
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
        Schema::dropIfExists('claim_amounts');
    }
}
