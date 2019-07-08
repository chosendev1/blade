<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->smallInteger('company_id')->unsigned();
            $table->smallInteger('branch_id')->unsigned();
            $table->string('name_of_applicant',50);
            $table->string('member_number',15)->unique();
            $table->string('gender',6);
            $table->string('maritual_status',8);
            $table->string('nationality',15);
            $table->string('date_of_birth',15);
            $table->string('phone_number',15)->unique();
            $table->string('phone_number2',15)->unique()->nullable();
            $table->string('email_address',40);
            $table->string('country',50);
            $table->string('district_city',40);
            $table->string('physical_address',40);
            $table->string('next_of_kin',50);
            $table->string('next_of_kin_phone_number',15);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')
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
        //Schema::dropIfExists('customers');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('customers');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
