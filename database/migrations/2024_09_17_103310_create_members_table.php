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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 100)->unique();
            $table->foreignId('branch_id')->nullable()->constrained('branches', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->enum('id_card_type', ['NIDA', 'ZANID'])->nullable();
            $table->string('id_card')->nullable();
            $table->string('phone', 15)->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->date('dob')->nullable();
            $table->enum('disability_status', ['Yes', 'No'])->nullable()->default('No');
            $table->string('disablity')->nullable();
            $table->string('disability_description')->nullable();
            $table->enum('employment_status',['Yes', 'No'])->nullable()->default('No');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
