<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('content_id');
            $table->decimal('discount_percentage', 5, 2);
            $table->string('image_url')->nullable();
            $table->string('token')->unique(); // Token unik untuk setiap promo
            $table->boolean('valid_for_course')->default(false); // Menentukan apakah promo ini valid untuk kursus tertentu
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        
            // Foreign key untuk menghubungkan dengan konten
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
