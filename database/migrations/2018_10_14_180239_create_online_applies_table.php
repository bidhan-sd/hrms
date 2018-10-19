<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_applies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_apply_id')->nullable();
            $table->integer('post_id')->nullable();
            $table->string('post_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('nationality')->nullable();
            $table->integer('national_id_no')->nullable();
            $table->integer('mobile_number')->nullable();
            $table->string('email_address')->nullable();
            $table->integer('totalExperince')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('ssc_exam')->nullable();
            $table->string('ssc_group')->nullable();
            $table->string('ssc_result')->nullable();
            $table->float('ssc_cgpa')->nullable();
            $table->integer('ssc_scale')->nullable();
            $table->float('ssc_marks')->nullable();
            $table->string('ssc_board')->nullable();
            $table->string('ssc_passing_year')->nullable();
            $table->string('hsc_exam')->nullable();
            $table->string('hsc_group')->nullable();
            $table->string('hsc_result')->nullable();
            $table->float('hsc_cgpa')->nullable();
            $table->integer('hsc_scale')->nullable();
            $table->float('hsc_marks')->nullable();
            $table->string('hsc_board')->nullable();
            $table->string('hsc_passing_year')->nullable();
            $table->string('honors_exam')->nullable();
            $table->string('honors_group')->nullable();
            $table->string('honors_result')->nullable();
            $table->float('honors_cgpa')->nullable();
            $table->integer('honors_scale')->nullable();
            $table->float('honors_marks')->nullable();
            $table->string('honors_board')->nullable();
            $table->integer('honors_passing_year')->nullable();
            $table->string('post_graduation_exam')->nullable();
            $table->string('post_graduation_group')->nullable();
            $table->string('post_graduation_result')->nullable();
            $table->float('post_graduation_cgpa')->nullable();
            $table->integer('post_graduation_scale')->nullable();
            $table->float('post_graduation_marks')->nullable();
            $table->string('post_graduation_board')->nullable();
            $table->integer('post_graduation_passing_year')->nullable();
            $table->string('other_graduation_exam')->nullable();
            $table->string('other_graduation_group')->nullable();
            $table->string('other_graduation_result')->nullable();
            $table->float('other_graduation_cgpa')->nullable();
            $table->integer('other_graduation_scale')->nullable();
            $table->float('other_graduation_marks')->nullable();
            $table->string('other_graduation_board')->nullable();
            $table->integer('other_graduation_passing_year')->nullable();
            $table->string('eOrganizationNameOne')->nullable();
            $table->string('edesignationOne')->nullable();
            $table->string('eJobTypeOne')->nullable();
            $table->text('eResponsibilitiesOne')->nullable();
            $table->date('eJoiningDateOne')->nullable();
            $table->date('eReleaseDateOne')->nullable();
            $table->string('eRunningDateOne')->nullable();
            $table->string('eOrganizationNameTwo')->nullable();
            $table->string('edesignationTwo')->nullable();
            $table->string('eJobTypeTwo')->nullable();
            $table->text('eResponsibilitiesTwo')->nullable();
            $table->date('eJoiningDateTwo')->nullable();
            $table->date('eReleaseDateTwo')->nullable();
            $table->string('eOrganizationNameThree')->nullable();
            $table->string('edesignationThree')->nullable();
            $table->string('eJobTypeThree')->nullable();
            $table->text('eResponsibilitiesThree')->nullable();
            $table->date('eJoiningDateThree')->nullable();
            $table->date('eReleaseDateThree')->nullable();
            $table->string('bSpeaking')->nullable();
            $table->string('bReading')->nullable();
            $table->string('bListening')->nullable();
            $table->string('bWriting')->nullable();
            $table->string('eSpeaking')->nullable();
            $table->string('eReading')->nullable();
            $table->string('eListening')->nullable();
            $table->string('eWriting')->nullable();
            $table->string('other_language')->nullable();
            $table->string('oSpeaking')->nullable();
            $table->string('oReading')->nullable();
            $table->string('oListening')->nullable();
            $table->string('oWriting')->nullable();
            $table->text('skills')->nullable();
            $table->string('referencesNameOne')->nullable();
            $table->string('referencesMobileOne')->nullable();
            $table->string('referencesEmailOne')->nullable();
            $table->text('referencesAddressOne')->nullable();
            $table->string('referencesNameTwo')->nullable();
            $table->string('referencesMobileTwo')->nullable();
            $table->string('referencesEmailTwo')->nullable();
            $table->text('referencesAddressTwo')->nullable();
            $table->string('photo')->nullable();
            $table->string('signature')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('online_applies');
    }
}
