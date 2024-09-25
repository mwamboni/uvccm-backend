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
        Schema::create('user_o_t_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 100)->unique();
            $table->string('phone', 100);
            $table->string('otp', 100);
            $table->timestamp('expired_at')->nullable();
            $table->string('mac_address', 100)->nullable();
            $table->string('ip_address', 100)->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_o_t_p_s');
    }
};
