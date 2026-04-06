<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\SendOtpRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use App\Services\OtpService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use ApiResponse;

    public function __construct(
        private readonly AuthService $authService,
        private readonly OtpService $otpService,
    ) {}

    /**
     * Send OTP verification code.
     *
     * Accepts an identifier (email or phone) and type.
     * Stores static OTP "123456" in the database.
     */
    public function sendOtp(SendOtpRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (! $this->otpService->canResend($data['identifier'], $data['type'])) {
            return $this->error('Please wait before requesting a new code.', 429);
        }

        $this->otpService->send($data['identifier'], $data['type']);

        return $this->success(null, 'Verification code sent successfully.');
    }

    /**
     * Register a new account.
     *
     * Accepts all user data plus email_code and phone_code.
     * Verifies OTP codes against the database, then creates user and returns token.
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $result = $this->authService->register($request->validated());

        if (! empty($result['error'])) {
            return $this->error($result['error'], 422);
        }

        return $this->success([
            'user' => new UserResource($result['user']),
            'token' => $result['token'],
            'token_type' => 'Bearer',
        ], 'Registration completed successfully! Your account is currently under review.', 201);
    }
}
