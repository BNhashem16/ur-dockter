<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AuthService
{
    public function __construct(
        private readonly OtpService $otpService,
    ) {}

    /**
     * Register a new user.
     *
     * Both email_code and phone_code must match a valid OTP record in the database.
     * If valid, the user is created as fully verified with a Sanctum token.
     * If invalid, no user is created.
     */
    public function register(array $data): array
    {
        // Verify email OTP against the database
        if (! $this->otpService->verify($data['email'], 'email', $data['email_code'])) {
            return ['error' => 'Invalid email verification code.'];
        }

        // Verify phone OTP against the database
        $phoneIdentifier = $data['phone_country_code'].$data['phone_number'];

        if (! $this->otpService->verify($phoneIdentifier, 'phone', $data['phone_code'])) {
            return ['error' => 'Invalid phone verification code.'];
        }

        return DB::transaction(function () use ($data) {
            $now = Carbon::now();

            $user = User::create([
                'account_type' => $data['account_type'],
                'group_name' => $data['group_name'],
                'owner_name' => $data['owner_name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'phone_country_code' => $data['phone_country_code'],
                'phone_number' => $data['phone_number'],
                'country_id' => $data['country_id'],
                'state_id' => $data['state_id'],
                'city_id' => $data['city_id'],
                'email_verified_at' => $now,
                'phone_verified_at' => $now,
                'account_status' => 'under_review',
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return [
                'user' => $user->load(['country', 'state', 'city']),
                'token' => $token,
            ];
        });
    }
}
