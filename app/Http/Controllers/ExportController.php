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
        $filters = $request->only(['search', 'age_range', 'gender', 'ministry', 'status']);
        
        // If filters are applied, get filtered members
        if (!empty(array_filter($filters))) {
            $members = $this->memberService->getFilteredMembers($filters);
        } else {
            $members = null; // Export all members
        }

        return $this->exportService->exportToCsv($members);
    }
}
