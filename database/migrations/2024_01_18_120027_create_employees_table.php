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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employeeId')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->enum('gender',['Male','Female'])->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('addharNo')->nullable();
            $table->string('panNo')->nullable();

            $table->string('address')->nullable();
            $table->foreignId('countryId')->constrained('countries');
            $table->foreignId('stateId')->constrained('states');
            $table->foreignId('cityId')->constrained('cities');
            $table->string('pincode')->nullable();
            $table->enum('status',['Active','Inactive'])->nullable();

            $table->string('bloodGroup')->nullable();
            $table->enum('parents',['Mother','Father'])->nullable();
            $table->string('parentName')->nullable();
            $table->string('phone2')->nullable();


            $table->string('image')->nullable();
            $table->string('addharCard')->nullable();
            $table->string('panCard')->nullable();
            $table->string('resume')->nullable();

            $table->string('designation')->nullable();
            $table->unsignedInteger('salary')->nullable();

            $table->string('bankName');
            $table->string('accountName');
            $table->string('accountNo');
            $table->string('ifsc');



            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
