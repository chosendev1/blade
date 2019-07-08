<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_products', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('company_id')->unsigned();
            $table->string('product_name');
            $table->string('interest_method');
            $table->decimal('interest_rate', 3, 2);
            $table->string('payment_frequency');
            $table->decimal('penalty_rate', 3, 2);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')
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
        //Schema::dropIfExists('loan_products');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('loan_products');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
