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
            $table->enum('gender', ['Mwanamke', 'Mwanamme'])->nullable();
            $table->date('dob')->nullable();
            $table->enum('disability_status', ['Ndio', 'Hapana'])->nullable()->default('Hapana');
            $table->string('disablity')->nullable();
            $table->string('disability_description')->nullable();
            $table->enum('employment_status',['Ndio', 'Hapana'])->nullable()->default('Ndio');
            $table->enum('employment_sector',['Serikali', 'Binafsi'])->nullable();
            $table->string('employment_institute')->nullable();
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
