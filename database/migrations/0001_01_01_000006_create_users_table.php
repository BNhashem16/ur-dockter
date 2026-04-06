<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('account_type', [
                'business',
                'doctor',
                'medical_center',
                'nurse',
                'medical_lab',
                'pharmacy',
            ]);
            $table->string('group_name');
            $table->string('owner_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_country_code', 10);
            $table->string('phone_number', 20);
            $table->foreignId('country_id')->constrained('countries');
            $table->foreignId('state_id')->constrained('states');
            $table->foreignId('city_id')->constrained('cities');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->enum('account_status', [
                'pending_email_verification',
                'pending_phone_verification',
                'under_review',
                'approved',
                'rejected',
            ])->default('pending_email_verification');
            $table->rememberToken();
            $table->timestamps();

            $table->index('account_type');
            $table->index('account_status');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
    }
};
