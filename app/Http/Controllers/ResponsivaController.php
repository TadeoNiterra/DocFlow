<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ResponsivaController extends Controller
{
    public function stream(Colaborador $colaborador)
    {
        // Carga ansiosa de relaciones necesarias
        $colaborador->load(['dispositivos.modeloEquipo']);

        // Se pasa en una colección para mantener la compatibilidad con el @foreach ($usuarios as $usuario) de tu HTML
        $pdf = Pdf::loadView('pdf.responsiva', [
            'usuarios' => collect([$colaborador]),
        ]);

        // Formato carta / vertical
        $pdf->setPaper('letter', 'portrait');

        return $pdf->stream("Responsiva_{$colaborador->id_colaborador}.pdf");
    }
}