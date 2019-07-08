<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRejectedLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejected_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('loan_id')->unsigned();
            $table->string('justification');
            $table->date('rejected_date');
            $table->timestamps();
            $table->foreign('loan_id')->references('id')->on('loan_applications')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('rejected_loans');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('rejected_loans');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
