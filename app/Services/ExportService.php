<?php

namespace App\Services;

use App\Models\Members;
use Illuminate\Support\Facades\Response;

class ExportService
{
    /**
     * Export members to CSV (compatible con Excel).
     */
    public function exportToCsv($members = null): \Symfony\Component\HttpFoundation\StreamedResponse
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
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF)); // BOM
            $delimiter = ';';

            fputcsv($file, [
                'Nombre', 'Documento', 'Fecha Nac.', 'Edad', 'Género', 'Estado Civil',
                'Celular', 'Email', 'Dirección', 'Barrio', 'Bautizado', 'Sellado',
                'Amigo/Relación', 'Ministerio', 'Rol', 'Fecha Ingreso', 'Estado',
            ], $delimiter);

            foreach ($members as $member) {
                fputcsv($file, [
                    $member->fullname,
                    $member->document_id,
                    optional($member->birth_date)->format('Y-m-d'),
                    $member->age,
                    ucfirst($member->gender),
                    ucfirst($member->marital_status),
                    $member->phone,
                    $member->email ?? '',
                    $member->address ?? '',
                    $member->neighborhood ?? '',
                    $member->is_baptized ? 'Sí' : 'No',
                    $member->is_sealed ? 'Sí' : 'No',
                    $member->friend_relation ?? '',
                    $member->formatted_ministry . ($member->ministry_role ? ' (' . ucfirst($member->ministry_role) . ')' : ''),
                    $member->formatted_church_role,
                    optional($member->join_date)->format('Y-m-d'),
                    ucfirst($member->status),
                ], $delimiter);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    /**
     * Export members to PDF.
     */
    public function exportToPdf($members = null)
    {
        if ($members === null) {
            $members = Members::all();
        }

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.members-pdf', compact('members'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('miembros_' . date('Y-m-d_His') . '.pdf');
    }

    /**
     * Export members to Word (.docx).
     */
    public function exportToWord($members = null)
    {
        if ($members === null) {
            $members = Members::all();
        }

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        
        // Estilos de sección
        $section = $phpWord->addSection([
            'orientation' => 'landscape',
            'marginTop' => 600,
            'marginBottom' => 600,
            'marginLeft' => 600,
            'marginRight' => 600,
        ]);

        // Encabezado
        $section->addText('IPUC - Avenida Libertadores', ['bold' => true, 'size' => 16, 'color' => '1e3a8a'], ['alignment' => 'center']);
        $section->addText('Lista de Miembros', ['bold' => true, 'size' => 12, 'color' => '4b5563'], ['alignment' => 'center']);
        $section->addText('Generado el: ' . date('d/m/Y H:i:s'), ['size' => 9, 'color' => '6b7280'], ['alignment' => 'center']);
        $section->addTextBreak(1);

        // Tabla
        $tableStyle = [
            'borderSize' => 6,
            'borderColor' => 'd1d5db',
            'cellMargin' => 80
        ];
        $phpWord->addTableStyle('MemberTable', $tableStyle);
        $table = $section->addTable('MemberTable');

        // Fila de encabezado
        $table->addRow();
        $headerStyle = ['bold' => true, 'size' => 10, 'fill' => 'f3f4f6'];
        $table->addCell(3000)->addText('Nombre', $headerStyle);
        $table->addCell(1500)->addText('Documento', $headerStyle);
        $table->addCell(800)->addText('Edad', $headerStyle);
        $table->addCell(1200)->addText('Género', $headerStyle);
        $table->addCell(2000)->addText('Ministerio', $headerStyle);
        $table->addCell(2500)->addText('Rol', $headerStyle);
        $table->addCell(1000)->addText('Estado', $headerStyle);

        // Datos
        foreach ($members as $member) {
            $table->addRow();
            $table->addCell(3000)->addText($member->fullname);
            $table->addCell(1500)->addText($member->document_id);
            $table->addCell(800)->addText($member->age);
            $table->addCell(1200)->addText(ucfirst($member->gender));
            $table->addCell(2000)->addText($member->formatted_ministry);
            $table->addCell(2500)->addText($member->formatted_church_role);
            
            $statusStyle = ['color' => ($member->status == 'activo' ? '065f46' : '991b1b'), 'bold' => true];
            $table->addCell(1000)->addText(ucfirst($member->status), $statusStyle);
        }

        $section->addTextBreak(1);
        $section->addText('Total de Miembros: ' . count($members), ['bold' => true, 'size' => 11], ['alignment' => 'right']);

        $filename = 'miembros_' . date('Y-m-d_His') . '.docx';
        $tempFile = tempnam(sys_get_temp_dir(), 'word');
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        return response()->download($tempFile, $filename)->deleteFileAfterSend(true);
    }
}
