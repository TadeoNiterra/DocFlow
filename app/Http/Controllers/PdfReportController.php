<?php

namespace App\Http\Controllers;

use App\Models\FormatoIt02Categoria;
use App\Models\FormatoIt02Permiso;
use App\Models\FormatoIt02Rol;
use App\Models\FormatoIt04;
use App\Models\FormatoIt09Proyecto;
use App\Models\FormatoIt11Reporte;
use App\Models\FormatoIt18Plan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class PdfReportController extends Controller
{
    /**
     * Helper privado para responder PDFs inline con encabezados limpios
     */
    private function streamPdf(string $view, array $data, string $filename, string $paper = 'letter', string $orientation = 'portrait'): Response
    {
        $pdf = Pdf::loadView($view, $data)->setPaper($paper, $orientation);

        return response($pdf->output(), 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => "inline; filename=\"{$filename}\"",
        ]);
    }

    public function formatoIt04(FormatoIt04 $record): Response
    {
        return $this->streamPdf('pdf.formato-it04', compact('record'), "F-IT-04-{$record->folio}.pdf");
    }

    public function formatoIt09(FormatoIt09Proyecto $record): Response
    {
        return $this->streamPdf('pdf.formato-it09', compact('record'), "F-IT-09-{$record->folio}.pdf", 'a4', 'landscape');
    }

    public function formatoIt11(FormatoIt11Reporte $record): Response
    {
        return $this->streamPdf('pdf.formato-it11', compact('record'), "{$record->folio}.pdf");
    }

    public function formatoIt18(FormatoIt18Plan $record): Response
    {
        return $this->streamPdf('pdf.formato-it18', compact('record'), "{$record->folio}.pdf");
    }

    public function formatoIt02(): Response
    {
        $roles = FormatoIt02Rol::orderBy('orden')->get();

        $categoriasFunciones = FormatoIt02Categoria::where('matriz_tipo', 'funciones')
            ->with('funciones')
            ->orderBy('orden')
            ->get();

        $categoriasRecursos = FormatoIt02Categoria::where('matriz_tipo', 'recursos')
            ->with('funciones')
            ->orderBy('orden')
            ->get();

        $permisosMap = [];
        foreach (FormatoIt02Permiso::all() as $p) {
            $permisosMap[$p->rol_id][$p->funcion_id] = $p->valor;
        }

        return $this->streamPdf(
            'pdf.formato-it02',
            compact('roles', 'categoriasFunciones', 'categoriasRecursos', 'permisosMap'),
            'F-IT-02_Matriz_Derechos_y_Privilegios.pdf',
            'a2',
            'landscape'
        );
    }
}