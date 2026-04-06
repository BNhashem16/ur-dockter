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
                'image_url' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=400&h=400&fit=crop',
            ],
            [
                'value' => 'doctor',
                'label' => 'Doctor',
                'description' => 'Individual doctor account.',
                'image_url' => 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=400&h=400&fit=crop',
            ],
            [
                'value' => 'medical_center',
                'label' => 'Medical Centers',
                'description' => 'Medical center account.',
                'image_url' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=400&h=400&fit=crop',
            ],
            [
                'value' => 'nurse',
                'label' => 'Nurses',
                'description' => 'Individual nurse account.',
                'image_url' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=400&h=400&fit=crop',
            ],
            [
                'value' => 'medical_lab',
                'label' => 'Medical Labs',
                'description' => 'Medical laboratory account.',
                'image_url' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=400&h=400&fit=crop',
            ],
            [
                'value' => 'pharmacy',
                'label' => 'Pharmacies',
                'description' => 'Pharmacy account.',
                'image_url' => 'https://images.unsplash.com/photo-1585435557343-3b092031a831?w=400&h=400&fit=crop',
            ],
        ];

        return $this->success($accountTypes, 'Account types retrieved successfully.');
    }
}
