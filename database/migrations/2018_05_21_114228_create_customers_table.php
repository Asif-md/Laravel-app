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
            $table->increments('id');
            $table->string('cx_name');
            $table->string('passport_number');
            $table->string('cx_image');
            $table->string('email')->unique(); 
            $table->string('father_name');
            $table->string('phone_number');
            $table->mediumText('cx_home_country_addr');
            $table->string('id_proof_number');
            $table->mediumText('foreign_addr');    
            $table->string('relative_contact_number');            
            $table->string('relation');
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
        Schema::dropIfExists('customers');
    }
}
