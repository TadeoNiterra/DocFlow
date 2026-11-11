<?php

namespace App\Http\Controllers;

use App\Models\ChecklistEquipo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChecklistPdfController extends Controller
{
    /**
     * Muestra / Descarga el PDF de un checklist individual.
     */
    public function download(ChecklistEquipo $checklist): Response
    {
        $checklist->load(['colaborador.departamento', 'dispositivo.modeloEquipo']);

        $pdf = Pdf::loadView('pdf.checklist', [
            'checklists' => collect([$checklist]),
        ]);

        $pdf->setPaper('letter', 'portrait');

        $fileName = 'Checklist_' . ($checklist->folio ?? $checklist->id) . '.pdf';

        return $pdf->stream($fileName);
    }

    /**
     * Genera un único PDF combinado con múltiples checklists seleccionados.
     */
    public function bulkDownload(Request $request): Response
    {
        $ids = explode(',', $request->query('ids', ''));

        $checklists = ChecklistEquipo::with(['colaborador.departamento', 'dispositivo.modeloEquipo'])
            ->whereIn('id', $ids)
            ->orderBy('fecha', 'desc')
            ->get();

        abort_if($checklists->isEmpty(), 404, 'No se encontraron registros de checklist seleccionados.');

        $pdf = Pdf::loadView('pdf.checklist', [
            'checklists' => $checklists,
        ]);

        $pdf->setPaper('letter', 'portrait');

        return $pdf->stream('Checklists_Lote_' . date('Ymd_His') . '.pdf');
    }
}