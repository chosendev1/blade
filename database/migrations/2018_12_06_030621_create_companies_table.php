<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('company_name');
            $table->string('date_established');
            $table->string('telephone_number');
            $table->string('company_email');
            $table->string('country');
            $table->string('district_city');
            $table->string('physical_address');
            $table->string('contact_person');
            $table->string('contact_person_position');
            $table->string('contact_phone_number');
            $table->softDeletes();
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
        //Schema::dropIfExists('companies');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('companies');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
