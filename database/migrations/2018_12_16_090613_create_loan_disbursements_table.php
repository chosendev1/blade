<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanDisbursementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_disbursements', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('loan_id')->unsigned();
            //$table->integer('amount_disbursed');
            $table->boolean('is_reversed_disbursement')->default(0);
            // $table->text('reversal_justification');
            $table->date('disbursement_date');
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
        //Schema::dropIfExists('loan_disbursements');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('loan_disbursements');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
