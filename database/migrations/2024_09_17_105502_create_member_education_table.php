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
        Schema::create('member_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('institute_name', 100);
            $table->string('level', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_education');
    }
};
