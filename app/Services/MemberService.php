<?php

namespace App\Services;

use App\Models\Members;
use Illuminate\Support\Facades\DB;

class MemberService
{
    /**
     * Create a new member.
     */
    public function create(array $data): Members
    {
        return DB::transaction(function () use ($data) {
            $member = new Members($data);
            $member->save();
            return $member;
        });
    }

    /**
     * Update an existing member.
     */
    public function update(Members $member, array $data): Members
    {
        return DB::transaction(function () use ($member, $data) {
            $member->fill($data);
            $member->save();
            return $member;
        });
    }

    /**
     * Delete a member.
     */
    public function delete(Members $member): bool
    {
        return DB::transaction(function () use ($member) {
            return $member->delete();
        });
    }

    /**
     * Get members with filters.
     */
    public function getFilteredMembers(array $filters = [])
    {
        $query = Members::query();

        // Search by name or document
        if (isset($filters['search']) && !empty($filters['search'])) {
            $query->search($filters['search']);
        }

        // Filter by age range
        if (isset($filters['age_range']) && !empty($filters['age_range'])) {
            $query->byAgeRange($filters['age_range']);
        }

        // Filter by gender
        if (isset($filters['gender']) && !empty($filters['gender'])) {
            $query->byGender($filters['gender']);
        }

        // Filter by ministry
        if (isset($filters['ministry']) && !empty($filters['ministry'])) {
            $query->byMinistry($filters['ministry']);
        }

        // Filter by status
        if (isset($filters['status']) && !empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query->orderBy('fullname')->get();
    }
}
