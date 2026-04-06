<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\StoreBranchRequest;
use App\Http\Requests\Branch\UpdateBranchRequest;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    use ApiResponse;

    /**
     * List all branches for the authenticated user.
     */
    public function index(Request $request): JsonResponse
    {
        $query = $request->user()
            ->branches()
            ->with(['country', 'state', 'city']);

        // Search by name or type
        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('type', 'like', "%{$search}%");
            });
        }

        // Filter by type
        if ($type = $request->query('type')) {
            $query->where('type', $type);
        }

        $branches = $query->orderBy('created_at', 'desc')->get();

        return $this->success(
            BranchResource::collection($branches),
            'Branches retrieved successfully.'
        );
    }

    /**
     * Create a new branch for the authenticated user.
     */
    public function store(StoreBranchRequest $request): JsonResponse
    {
        $branch = $request->user()
            ->branches()
            ->create($request->validated());

        $branch->load(['country', 'state', 'city']);

        return $this->success(
            new BranchResource($branch),
            'Branch created successfully.',
            201
        );
    }

    /**
     * Show a specific branch.
     */
    public function show(Request $request, Branch $branch): JsonResponse
    {
        // Ensure the branch belongs to the authenticated user
        if ($branch->user_id !== $request->user()->id) {
            return $this->error('Branch not found.', 404);
        }

        $branch->load(['country', 'state', 'city']);

        return $this->success(
            new BranchResource($branch),
            'Branch retrieved successfully.'
        );
    }

    /**
     * Update a specific branch.
     */
    public function update(UpdateBranchRequest $request, Branch $branch): JsonResponse
    {
        if ($branch->user_id !== $request->user()->id) {
            return $this->error('Branch not found.', 404);
        }

        $branch->update($request->validated());
        $branch->load(['country', 'state', 'city']);

        return $this->success(
            new BranchResource($branch),
            'Branch updated successfully.'
        );
    }

    /**
     * Delete a specific branch.
     */
    public function destroy(Request $request, Branch $branch): JsonResponse
    {
        if ($branch->user_id !== $request->user()->id) {
            return $this->error('Branch not found.', 404);
        }

        $branch->delete();

        return $this->success(null, 'Branch deleted successfully.');
    }
}
