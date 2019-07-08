<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollateralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaterals', function (Blueprint $table) {
        $table->increments('id');
        /*$table->integer('company_id')->unsigned();
        $table->integer('branch_id')->unsigned();*/
        $table->mediumInteger('loan_applications_id')->unsigned();
        $table->string('collateral_type');
        $table->integer('collateral_value');
        $table->string('collateral_location');
        $table->softDeletes();
        $table->timestamps();
        $table->foreign('loan_applications_id')->references('id')
            ->on('loan_applications')
            ->onDelete('cascade')->onUpdate('cascade');
        /*$table->foreign('company_id')->references('id')->on('companies')
            ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('branch_id')->references('id')->on('branches')
            ->onDelete('cascade')->onUpdate('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('collaterals');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('collaterals');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
