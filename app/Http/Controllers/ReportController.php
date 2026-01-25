<?php

namespace App\Http\Controllers;

use App\Services\StatisticsService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected StatisticsService $statisticsService;

    public function __construct(StatisticsService $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    /**
     * Show reports page with statistics.
     */
    public function index()
    {
        $stats = $this->statisticsService->getAllStatistics();

        // Calculate activity rate (percentage of active members)
        $activityRate = $stats['total'] > 0 
            ? round(($stats['active'] / $stats['total']) * 100, 2)
            : 0;

        // Calculate baptism rate
        $baptismRate = $stats['total'] > 0 
            ? round(($stats['baptized'] / $stats['total']) * 100, 2)
            : 0;

        // Calculate sealed rate
        $sealedRate = $stats['total'] > 0 
            ? round(($stats['sealed'] / $stats['total']) * 100, 2)
            : 0;

        return view('reports.index', [
            'stats' => $stats,
            'activityRate' => $activityRate,
            'baptismRate' => $baptismRate,
            'sealedRate' => $sealedRate,
        ]);
    }

    /**
     * Export reports to PDF.
     */
    public function exportPdf()
    {
        // Future implementation for PDF export
        return redirect()->back()->with('info', 'PDF export coming soon');
    }

    /**
     * Export reports to Excel.
     */
    public function exportExcel()
    {
        // Future implementation for Excel export
        return redirect()->back()->with('info', 'Excel export coming soon');
    }
}
