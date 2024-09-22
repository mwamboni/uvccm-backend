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
        Schema::create('meeting_members', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->foreignId('meeting_id')->constrained('meetings','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('member_id')->nullable()->constrained('users','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('is_present')->default(false)->comment('1 = Present, 0 = Absent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_members');
    }
};
