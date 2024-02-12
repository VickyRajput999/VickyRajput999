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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('empid')->constrained('employees');
            $table->string('name')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->integer('totalDays')->nullable();
            $table->integer('presentDays')->nullable();
            $table->integer('absentDays')->nullable();
            $table->integer('leaveDays')->nullable();
            $table->integer('baisc')->nullable();
            $table->integer('bonus')->nullable();
            $table->integer('deductions')->nullable();
            $table->integer('totalSalary')->nullable();
            $table->enum('status',['paid','notPaid'])->nullable();
            $table->date('paidDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
