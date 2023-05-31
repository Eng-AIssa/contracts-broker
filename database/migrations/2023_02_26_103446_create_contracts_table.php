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
        Schema::create('contracts', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->foreignId('owner_id')->unsigned();
            $table->foreignId('unit_id')->unsigned();
            $table->foreignId('resident_id')->unsigned();
            $table->date('entry_date');
            $table->date('leaving_date');
            $table->enum('status', array('اعتماد المستأجر', 'مرفوض', 'مراجعة الوسيط', 'دفع المالك', 'معتمد', 'ملغي قبل الدفع', 'ملغي بعد الدفع'));
            $table->double('contract_fees');
            $table->double('rental_fees')->nullable();
            $table->string('otp')->nullable();
            $table->foreignId('created_by')->unsigned();
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('resident_id')->references('id')->on('residents');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unique(['unit_id', 'entry_date', 'leaving_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
