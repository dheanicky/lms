<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoContentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_content_details', function (Blueprint $table) {
            $table->id(); // Primary key

            // Foreign key to content_details
            $table->unsignedBigInteger('content_detail_id');
            $table->foreign('content_detail_id')
                  ->references('id')
                  ->on('content_details')
                  ->onDelete('cascade');

            // Foreign key to videos
            $table->unsignedBigInteger('video_id');
            $table->foreign('video_id')
                  ->references('id')
                  ->on('videos')
                  ->onDelete('cascade');

            $table->boolean('watched')->default(false); 

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_content_details');
    }
}
