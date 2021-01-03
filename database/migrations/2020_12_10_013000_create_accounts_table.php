<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('operation');
            $table->string('salutation');
            $table->string('saving_scheme');
            $table->string('regular_option')->nullable();
            $table->string('regular_amount')->nullable();
            $table->string('regular_duration')->nullable();
            $table->string('general_option')->nullable();
            $table->string('fixed_amount')->nullable();
            $table->string('fixed_duration')->nullable();
            $table->string('fixed_payment')->nullable();

            $table->string('fullName');
            $table->string('fatherName');
            $table->string('motherName');
            $table->string('grandfatherName');
            $table->string('spouseName')->nullable();
            $table->string('permanent_state');
            $table->string('permanent_district');
            $table->string('permanent_municipality');
            $table->string('permanent_ward');
            $table->string('permanent_tole')->nullable();
            $table->string('temporary_state');
            $table->string('temporary_district');
            $table->string('temporary_municipality');
            $table->string('temporary_ward');
            $table->string('temporary_tole')->nullable();
            $table->string('dob_year');
            $table->string('dob_month');
            $table->string('dob_day');
            $table->string('citizen_passport');
            $table->string('issued_place');
            $table->string('marital_status');
            $table->string('nationality')->nullable();
            $table->string('occupation')->nullable();
            $table->string('office_number')->nullable();
            $table->string('residence_number')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile');

            $table->string('minor');
            $table->string('guardian_name')->nullable();
            $table->string('guardian_relation')->nullable();
            $table->string('guardian_year')->nullable();
            $table->string('guardian_month')->nullable();
            $table->string('guardian_day')->nullable();
            $table->string('guardian_citizen_passport')->nullable();
            $table->string('guardian_signature');

            $table->string('mobile_banking');
            $table->string('sms_banking');
            $table->string('collection_service');
            $table->string('collection_point')->nullable();
            $table->string('collection_day')->nullable();

            $table->string('nominee_name')->nullable();
            $table->string('nominee_relation')->nullable();
            $table->string('nominee_citizen_passport')->nullable();

            $table->string('introducer_name')->nullable();
            $table->string('introducer_phone')->nullable();
            $table->string('introducer_account')->nullable();

            $table->string('signature_upload')->nullable();
            $table->string('citizen_passport_upload');
            $table->string('photo_upload');
            $table->string('joint_upload')->nullable();
            $table->string('left_thumb_upload')->nullable();
            $table->string('right_thumb_upload')->nullable();

            $table->string('status');
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
        Schema::dropIfExists('accounts');
    }
}
