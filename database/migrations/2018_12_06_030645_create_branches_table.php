<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('company_id')->unsigned();
            $table->string('branch_name');
            $table->string('country');
            $table->string('district_city');
            $table->string('physical_address');
            $table->string('contact_person');
            $table->string('contact_person_position');
            $table->string('contact_phone_number');
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
        //Schema::dropIfExists('branches');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('branches');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
