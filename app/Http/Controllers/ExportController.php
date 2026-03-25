<?php

namespace App\Http\Controllers;

use App\Services\ExportService;
use App\Services\MemberService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    protected ExportService $exportService;
    protected MemberService $memberService;

    public function __construct(ExportService $exportService, MemberService $memberService)
    {
        $this->exportService = $exportService;
        $this->memberService = $memberService;
    }

    /**
     * Export members to CSV.
     */
    public function export(Request $request): StreamedResponse
    {
        $members = $this->getMembersForExport($request);
        return $this->exportService->exportToCsv($members);
    }

    /**
     * Export members to PDF.
     */
    public function exportPdf(Request $request)
    {
        $members = $this->getMembersForExport($request);
        return $this->exportService->exportToPdf($members);
    }

    /**
     * Export members to Word.
     */
    public function exportWord(Request $request)
    {
        $members = $this->getMembersForExport($request);
        return $this->exportService->exportToWord($members);
    }

    /**
     * Helper to get members based on request filters.
     */
    protected function getMembersForExport(Request $request)
    {
        $filters = $request->only(['search', 'age_range', 'gender', 'ministry', 'status']);
        
        if (!empty(array_filter($filters))) {
            return $this->memberService->getFilteredMembers($filters);
        }

        return null; // Export all members
    }
}
