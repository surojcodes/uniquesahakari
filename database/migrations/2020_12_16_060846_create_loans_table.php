<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('salutation');
            $table->string('fullName');
            $table->string('fatherName');
            $table->string('motherName');
            $table->string('grandfatherName');
            $table->string('spouseName')->nullable();
            $table->string('membershipNumber');
            $table->string('loanAmount');
            $table->string('loanAmountWords');
            $table->string('loanType');
            $table->string('repayTime');
            $table->string('loan_id')->nullable();
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
        Schema::dropIfExists('loans');
    }
}
