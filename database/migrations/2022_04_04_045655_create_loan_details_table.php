<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('loan_amount',10,2);
            $table->bigInteger('interest_rate_id')->unsigned();
            $table->date('interest_start_date')->nullable();
            $table->string('loan_amount_string');
            $table->decimal('balance');
            $table->string('receive_method');
            $table->string('maintainace_branch')->nullable();
            $table->string('name_on_account')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_type')->nullable();
            $table->bigInteger('loan_status_id')->unsigned();  
            $table->string('number_of_repayments')->nullable();
            $table->string('repayment_cycle');
            $table->string('note')->nullable();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('interest_rate_id')
            ->references('id')
            ->on('interest_rates')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('loan_status_id')
            ->references('id')
            ->on('loan_statuses')
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
        Schema::dropIfExists('loan_details');
    }
}
