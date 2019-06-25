<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('director');
            $table->integer('finance');
            $table->integer('dep_admin');
            $table->integer('semester');
            $table->year('year');
            $table->integer('faculty_id');
            $table->integer('department_id');
            $table->integer('department_admin_id');
            $table->integer('service');//technical,teaching
            $table->string('bank');
            $table->bigInteger('acc_no');
            $table->double('total')->nullable()->unsigned();

            //            $table->integer('claim_type')->unsigned();
//            $table->double('service')->nullable()->unsigned();
//            $table->double('marking')->nullable()->unsigned();
//            $table->double('transport')->nullable()->unsigned();
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
        Schema::dropIfExists('claims');
    }
}
