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
        Schema::create('attendaces', function (Blueprint $table) {
            $table->id();
            $table->string('empid')->constrained('employees');
            $table->string('empName');
            $table->date('date');
            $table->time('checkIn');
            $table->time('checkOut');
            $table->enum('attendace', ['present','leave','absent']);
            $table->enum('status', ['Active','inactive']);
            $table->string('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendaces');
    }
};
