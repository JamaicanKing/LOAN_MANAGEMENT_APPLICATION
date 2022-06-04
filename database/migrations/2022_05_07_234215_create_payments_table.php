<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('loan_details_id')->unsigned();
            $table->decimal('paid_amount',10,2);
            $table->string('collection_date')->nullable();
            $table->string('proof_of_payment')->nullable();
            $table->string('method_of_payment');
            $table->string('payment_location')->nullable();
            $table->string('time_of_payment')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('confirmed')->nullable();
            $table->timestamps();

            $table->foreign('loan_details_id')
            ->references('id')
            ->on('loan_details')
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
        Schema::dropIfExists('payments');
    }
}
