<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Http\Resources\BranchResource;
use App\Http\Resources\UserResource;
use App\Models\Banner;
use App\Models\Branch;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiResponse;

    /**
     * Home — works with or without a token.
     *
     * Guest:         banners + stats
     * Authenticated: greeting + user + profile status + banners + branches + stats
     */
    public function index(Request $request): JsonResponse
    {
        $banners = Banner::active()->ordered()->get();

        $stats = [
            'total_medical_labs' => User::where('account_type', 'medical_lab')
                ->where('account_status', 'approved')
                ->count(),
            'total_medical_centers' => User::where('account_type', 'medical_center')
                ->where('account_status', 'approved')
                ->count(),
            'total_doctors' => User::where('account_type', 'doctor')
                ->where('account_status', 'approved')
                ->count(),
            'total_pharmacies' => User::where('account_type', 'pharmacy')
                ->where('account_status', 'approved')
                ->count(),
            'total_branches' => Branch::count(),
        ];

        $data = [
            'banners' => BannerResource::collection($banners),
            'stats' => $stats,
        ];

        // If authenticated, add user-specific data
        $user = auth('sanctum')->user();

        if ($user) {
            $user->load(['country', 'state', 'city']);

            $branches = $user->branches()
                ->with(['country', 'state', 'city'])
                ->orderBy('created_at', 'desc')
                ->get();

            $data = array_merge([
                'greeting' => $this->buildGreeting($user),
                'user' => new UserResource($user),
                'profile_complete' => $user->isProfileComplete(),
            ], $data, [
                'branches' => BranchResource::collection($branches),
            ]);
        }

        return $this->success($data, 'Home data retrieved successfully.');
    }

    /**
     * Build a time-based greeting message.
     */
    private function buildGreeting(User $user): string
    {
        $hour = (int) now()->format('H');

        $timeGreeting = match (true) {
            $hour < 12 => 'Good Morning',
            $hour < 17 => 'Good Afternoon',
            default => 'Good Evening',
        };

        return "{$timeGreeting} {$user->group_name}";
    }
}
