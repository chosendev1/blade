<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->smallInteger('company_id')->unsigned();
            $table->smallInteger('branch_id')->unsigned();
            $table->smallInteger('loan_product_id')->unsigned();
            $table->mediumInteger('customer_id')->unsigned();
            $table->integer('amount_applied');
            $table->integer('loan_period');
            $table->date('loan_application_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('loan_product_id')->references('id')->on('loan_products')
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
        //Schema::dropIfExists('loan_applications');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('loan_applications');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
