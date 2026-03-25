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

        return view('reports.index', [
            'stats' => $stats,
            'activityRate' => $stats['activity_rate'],
            'baptismRate' => $stats['baptism_rate'],
            'sealedRate' => $stats['sealed_rate'],
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
