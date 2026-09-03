<?php

namespace App\Http\Controllers;

use App\Models\FormatoIt22Evaluation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class SupplierEvaluationPdfController extends Controller
{
    public function download($record): Response
    {
        // 🟢 Si nos llega un ID o un objeto, nos aseguramos de resolver el modelo completo desde la BD
        if ($record instanceof FormatoIt22Evaluation) {
            $evaluation = $record->load(['correctiveActions', 'proveedor']);
        } else {
            $evaluation = FormatoIt22Evaluation::with(['correctiveActions', 'proveedor'])->findOrFail($record);
        }

        // Cargar vista en tamaño Carta vertical
        $pdf = Pdf::loadView('pdf.evaluacion-proveedor', [
            'evaluation' => $evaluation
        ])->setPaper('letter', 'portrait');

        $nombreProveedor = $evaluation->supplier_name ?? $evaluation->proveedor?->nombre ?? 'Proveedor';
        $filename = "F-IT-22_Evaluacion_{$nombreProveedor}.pdf";

        return $pdf->stream($filename);
    }
}