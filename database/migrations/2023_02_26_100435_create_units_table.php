<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('sector_id')->unsigned();
            $table->foreignId('owner_id')->unsigned();
            $table->foreignId('responsible_id')->unsigned();
            $table->enum('responsible_as', array('مالك', 'معيد التأجير', 'وكيل'));
            $table->foreignId('created_by')->unsigned();
            $table->timestamps();


            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('responsible_id')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('sector_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
