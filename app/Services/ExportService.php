<?php

namespace App\Services;

use App\Models\Members;
use Illuminate\Support\Facades\Response;

class ExportService
{
    /**
     * Export members to CSV.
     */
    public function exportToCsv(array $members = null): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        if ($members === null) {
            $members = Members::all();
        }

        $filename = 'miembros_' . date('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () use ($members) {
            $file = fopen('php://output', 'w');

            // Add BOM for UTF-8 to ensure Excel opens it correctly
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // CSV Headers
            fputcsv($file, [
                'Nombre',
                'Documento',
                'Fecha Nac.',
                'Edad',
                'Género',
                'Estado Civil',
                'Celular',
                'Email',
                'Dirección',
                'Barrio',
                'Bautizado',
                'Sellado',
                'Amigo/Relación',
                'Ministerio',
                'Rol',
                'Fecha Ingreso',
                'Estado',
            ]);

            // CSV Data
            foreach ($members as $member) {
                fputcsv($file, [
                    $member->fullname,
                    $member->document_id,
                    $member->birth_date->format('Y-m-d'),
                    $member->age,
                    $member->gender,
                    $member->marital_status,
                    $member->phone,
                    $member->email ?? '',
                    $member->address ?? '',
                    $member->neighborhood ?? '',
                    $member->is_baptized ? 'Sí' : 'No',
                    $member->is_sealed ? 'Sí' : 'No',
                    $member->friend_relation ?? '',
                    $member->formatted_ministry . ($member->ministry_role ? ' (' . ucfirst($member->ministry_role) . ')' : ''),
                    $member->formatted_church_role,
                    $member->join_date->format('Y-m-d'),
                    $member->status,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
