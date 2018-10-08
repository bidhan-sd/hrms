<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_name');
            $table->string('company_name');
            $table->integer('vacancy');
            $table->text('job_responsibilities');
            $table->string('employee_status');
            $table->text('educational_requirement');
            $table->text('experience_requirement');
            $table->text('additional_requirement');
            $table->string('gender');
            $table->string('job_location');
            $table->string('salary');
            $table->text('other_benefit');
            $table->date('advertisement_date');
            $table->date('deadline');
            $table->text('company_info');
            $table->tinyInteger('publication_status');
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
        Schema::dropIfExists('advertisements');
    }
}
