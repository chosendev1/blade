<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('loan_id')->unsigned();
            $table->integer('amount_approved');
            $table->date('approval_date');
            $table->boolean('is_reversed_approval')->default(0);
            $table->string('justification');
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
        //Schema::dropIfExists('loan_approvals');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('loan_approvals');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
