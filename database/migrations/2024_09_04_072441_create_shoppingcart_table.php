<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingcartTable extends Migration
{
    public function up()
    {
        Schema::create('shoppingcart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('content_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->string('status')->default('pending'); // pending, paid
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shoppingcart');
    }
}
