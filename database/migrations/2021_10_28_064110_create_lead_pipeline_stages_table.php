<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadPipelineStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_pipeline_stages', function (Blueprint $table) {
            $table->id();
            $table->integer('probability')->default(0);
            $table->integer('sort_order')->default(0);

            $table->unsignedBigInteger('lead_stage_id');
            $table->foreign('lead_stage_id')->references('id')->on('lead_stages')->onDelete('cascade');

            $table->unsignedBigInteger('lead_pipeline_id');
            $table->foreign('lead_pipeline_id')->references('id')->on('lead_pipelines')->onDelete('cascade');
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
        Schema::dropIfExists('lead_pipeline_stages');
    }
}
