<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradeables', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('gradeable_id')->index();
            $table->string('gradeable_type');

            $table->foreignUuid('grade_id')->references('id')->on('grades');

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
        Schema::dropIfExists('gradeables');
    }
}
