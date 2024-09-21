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
        Schema::create('s_m_s_configurations', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('sender_name');
            $table->string('api_key');
            $table->string('secret_key');
            $table->integer('sms_count');
            $table->string('base_api_url');
            $table->string('otp_api_url');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_m_s_configurations');
    }
};
