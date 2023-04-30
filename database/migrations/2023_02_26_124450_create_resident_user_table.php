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
        Schema::create('resident_user', function (Blueprint $table) {
            $table->primary(['resident_id', 'user_id']);
            $table->foreignId('resident_id');
            $table->foreignId('user_id');
            $table->timestamps();

            $table->foreign('resident_id')->references('id')->on('residents')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resident_user');
    }
};
