<?php

namespace App\Services;

use App\Models\Members;
use Illuminate\Support\Facades\DB;

class StatisticsService
{
    /**
     * Get total members count.
     */
    public function getTotalMembers(): int
    {
        return Members::count();
    }

    /**
     * Get active members count.
     */
    public function getActiveMembers(): int
    {
        return Members::active()->count();
    }

    /**
     * Get inactive members count.
     */
    public function getInactiveMembers(): int
    {
        return Members::inactive()->count();
    }

    /**
     * Get baptized members count.
     */
    public function getBaptizedMembers(): int
    {
        return Members::where('is_baptized', true)->count();
    }

    /**
     * Get sealed members count.
     */
    public function getSealedMembers(): int
    {
        return Members::where('is_sealed', true)->count();
    }

    /**
     * Get distribution by age range.
     */
    public function getDistributionByAgeRange(): array
    {
        $distribution = Members::select('age_range', DB::raw('count(*) as count'))
            ->groupBy('age_range')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->age_range => $item->count];
            })
            ->toArray();

        return [
            'niños' => $distribution['niños'] ?? 0,
            'jóvenes' => $distribution['jóvenes'] ?? 0,
            'adultos' => $distribution['adultos'] ?? 0,
            'adultos_mayores' => $distribution['adultos_mayores'] ?? 0,
        ];
    }

    /**
     * Get distribution by gender.
     */
    public function getDistributionByGender(): array
    {
        $distribution = Members::select('gender', DB::raw('count(*) as count'))
            ->groupBy('gender')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->gender => $item->count];
            })
            ->toArray();

        return [
            'masculino' => $distribution['masculino'] ?? 0,
            'femenino' => $distribution['femenino'] ?? 0,
        ];
    }

    /**
     * Get distribution by ministry.
     */
    public function getDistributionByMinistry(): array
    {
        return Members::select('ministry', DB::raw('count(*) as count'))
            ->groupBy('ministry')
            ->orderByDesc('count')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->ministry => $item->count];
            })
            ->toArray();
    }

    /**
     * Get all statistics for dashboard.
     */
    public function getAllStatistics(): array
    {
        return [
            'total' => $this->getTotalMembers(),
            'active' => $this->getActiveMembers(),
            'inactive' => $this->getInactiveMembers(),
            'baptized' => $this->getBaptizedMembers(),
            'sealed' => $this->getSealedMembers(),
            'by_age_range' => $this->getDistributionByAgeRange(),
            'by_gender' => $this->getDistributionByGender(),
            'by_ministry' => $this->getDistributionByMinistry(),
        ];
    }
}
