<?php

namespace App\Http\Controllers;

use App\Models\FormatoLog01;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class FormatoLog01PdfController extends Controller
{
    public function download($id)
    {
        $evaluacion = FormatoLog01::with('proveedor')->findOrFail($id);
        $proveedor = $evaluacion->proveedor;

        // 🟢 CÁLCULOS SECCIÓN 2: RESULTADO DE SELECCIÓN (PRELIMINAR)
        $totalPreliminar = (int) $evaluacion->precio + (int) $evaluacion->respuesta + (int) $evaluacion->pago + (int) ($evaluacion->experiencia ?? 0); //[cite: 1]
        $maxPreliminar = 8; // 4 criterios * 2 pts máx[cite: 1]
        $pctPreliminar = ($totalPreliminar / $maxPreliminar) * 100; //[cite: 1]

        // 🟢 CÁLCULOS SECCIÓN 3: RESULTADOS DE EVALUACIÓN (15 PREGUNTAS)[cite: 1]
        $cat1_desempeno = (int) $evaluacion->pregunta1 + (int) $evaluacion->pregunta2; //[cite: 1]
        $cat2_servicio = (int) $evaluacion->pregunta3 + (int) $evaluacion->pregunta4 + (int) $evaluacion->pregunta5; //[cite: 1]
        $cat3_percepcion = (int) $evaluacion->pregunta6 + (int) $evaluacion->pregunta7 + (int) ($evaluacion->pregunta8_sub ?? 0); //[cite: 1]
        $cat4_confiab = (int) $evaluacion->pregunta8 + (int) $evaluacion->pregunta9 + (int) $evaluacion->pregunta10; //[cite: 1]

        $cat5_seguridad = (int) ($evaluacion->pregunta11 ?? 0) +
            (int) ($evaluacion->pregunta12 ?? 0) +
            (int) ($evaluacion->pregunta13 ?? 0) +
            (int) ($evaluacion->pregunta14 ?? 0) +
            (int) ($evaluacion->pregunta15 ?? 0); //[cite: 1]

        $totalPuntosEvaluacion = $cat1_desempeno + $cat2_servicio + $cat3_percepcion + $cat4_confiab + $cat5_seguridad;
        $maxEvaluacion = 30; // 15 preguntas * 2 pts máx[cite: 1]
        $pctEvaluacion = number_format(($totalPuntosEvaluacion / $maxEvaluacion) * 100, 1); //[cite: 1]

        // Dictamen Final (Aprobado / Condicionado / Rechazado)[cite: 1]
        if ($pctEvaluacion >= 80) {
            $dictamen = 'APROBADO';
            $codigoDictamen = 'A';
        } elseif ($pctEvaluacion >= 60) {
            $dictamen = 'CONDICIONADO';
            $codigoDictamen = 'C';
        } else {
            $dictamen = 'RECHAZADO';
            $codigoDictamen = 'R';
        }

        $pdf = Pdf::loadView('pdf.formato-log01', compact(
            'evaluacion',
            'proveedor',
            'totalPreliminar',
            'pctPreliminar',
            'cat1_desempeno',
            'cat2_servicio',
            'cat3_percepcion',
            'cat4_confiab',
            'cat5_seguridad',
            'totalPuntosEvaluacion',
            'pctEvaluacion',
            'dictamen',
            'codigoDictamen'
        ))->setPaper('letter', 'portrait');

        return $pdf->stream("Formato_LOG_01_{$proveedor->nombre}.pdf");
    }
}