<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class AccountTypeController extends Controller
{
    use ApiResponse;

    /**
     * List available account types for the registration screen (Step 1).
     */
    public function index(): JsonResponse
    {
        $accountTypes = [
            [
                'value' => 'business',
                'label' => 'Business Account',
                'description' => 'Manage single & multiple branches or locations under one account.',
            ],
            [
                'value' => 'doctor',
                'label' => 'Doctor',
                'description' => 'Individual doctor account.',
            ],
            [
                'value' => 'medical_center',
                'label' => 'Medical Centers',
                'description' => 'Medical center account.',
            ],
            [
                'value' => 'nurse',
                'label' => 'Nurses',
                'description' => 'Individual nurse account.',
            ],
            [
                'value' => 'medical_lab',
                'label' => 'Medical Labs',
                'description' => 'Medical laboratory account.',
            ],
            [
                'value' => 'pharmacy',
                'label' => 'Pharmacies',
                'description' => 'Pharmacy account.',
            ],
        ];

        return $this->success($accountTypes, 'Account types retrieved successfully.');
    }
}
