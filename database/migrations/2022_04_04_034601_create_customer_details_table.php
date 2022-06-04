<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->decimal('phone_number',11,0);
            $table->decimal('secondary_contact',11,0);
            $table->string('address');
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('postal');
            $table->decimal('trn',9,0);
            $table->binary('identification');
            $table->string('identification_number');
            $table->date('identification_expiration');
            $table->string('contact_person_name');
            $table->string('contact_person_address');
            $table->decimal('contact_person_number',11,0);
            $table->string('kinship');
            $table->string('length_of_relationship');
            $table->timestamps();


            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_details');
    }
}
