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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            // order id
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            // user details:
            $table->string('f_name');
            $table->string('l_name');
            $table->string('phone');
            $table->string('email');
            // address:
            $table->string('province');
            $table->string('city');
            $table->string('street');
            $table->string('alley');
            $table->string('plaque');
            $table->string('post_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
