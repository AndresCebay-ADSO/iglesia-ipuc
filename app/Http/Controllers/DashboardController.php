<?php

namespace App\Http\Controllers;

use App\Services\StatisticsService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    protected StatisticsService $statisticsService;

    public function __construct(StatisticsService $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    /**
     * Get dashboard statistics.
     */
    public function index(): View
    {
        $statistics = $this->statisticsService->getAllStatistics();

        return view('dashboard.index', compact('statistics'));
    }
}
