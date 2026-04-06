<?php

namespace App\Services;

use App\Models\OtpVerification;
use Carbon\Carbon;

class OtpService
{
    /**
     * Static OTP code (digits 1-6).
     */
    public const STATIC_OTP = '123456';

    private const OTP_EXPIRY_MINUTES = 10;

    private const OTP_RESEND_COOLDOWN_SECONDS = 60;

    /**
     * Send OTP — stores static code "123456" in the database.
     *
     * @param  string  $identifier  Email address or phone number
     * @param  string  $type  "email" or "phone"
     */
    public function send(string $identifier, string $type): OtpVerification
    {
        // Invalidate any existing unused OTPs for this identifier and type
        OtpVerification::where('identifier', $identifier)
            ->where('type', $type)
            ->where('is_used', false)
            ->update(['is_used' => true]);

        return OtpVerification::create([
            'identifier' => $identifier,
            'type' => $type,
            'code' => self::STATIC_OTP,
            'expires_at' => Carbon::now()->addMinutes(self::OTP_EXPIRY_MINUTES),
        ]);
    }

    /**
     * Verify OTP — checks that a matching, unused, non-expired code exists in the DB.
     *
     * @param  string  $identifier  Email address or phone number
     * @param  string  $type  "email" or "phone"
     * @param  string  $code  The code to verify
     */
    public function verify(string $identifier, string $type, string $code): bool
    {
        $otp = OtpVerification::where('identifier', $identifier)
            ->where('type', $type)
            ->where('code', $code)
            ->where('is_used', false)
            ->where('expires_at', '>', Carbon::now())
            ->latest()
            ->first();

        if (! $otp) {
            return false;
        }

        $otp->update(['is_used' => true]);

        return true;
    }

    /**
     * Check if a new OTP can be sent (cooldown check).
     */
    public function canResend(string $identifier, string $type): bool
    {
        $lastOtp = OtpVerification::where('identifier', $identifier)
            ->where('type', $type)
            ->latest()
            ->first();

        if (! $lastOtp) {
            return true;
        }

        return $lastOtp->created_at->diffInSeconds(Carbon::now()) >= self::OTP_RESEND_COOLDOWN_SECONDS;
    }
}
