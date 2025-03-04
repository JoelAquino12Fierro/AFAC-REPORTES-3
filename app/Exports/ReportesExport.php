<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportesExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths
{
    /**
     * Obtener los datos de la tabla
     */
    public function collection()
    {
        return Report::join('types_reports', 'reports.types_reports', '=', 'types_reports.id')
        ->join('areas', 'reports.areas', '=', 'areas.id')
        ->join('systems', 'reports.systems', '=', 'systems.id')
        ->select(
            'reports.folio',
            'reports.application_date',
            'reports.report_date',
            'areas.areas_name as area_name',
            'systems.systems_name as system_name',
            'types_reports.name_types_reports as type_report_name',
            'reports.report_user',
            'reports.description',
            'reports.evidence',
            'reports.status'
        )->get();
        }
    /**
     * Encabezados de las columnas
     */
    public function headings(): array
    {
        return [
            'FOLIO',
            'FECHA DE APLICACIÓN',
            'FECHA DE REPORTE',
            'ÁREA',
            'SISTEMA',
            'TIPO DE REPORTE',
            'USUARIO QUE REALIZÓ EL REPORTE',
            'DESCRIPCIÓN',
            'EVIDENCIA',
            'ESTADO'
        ];
    }

    /**
     * Estilos para los títulos
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Estilos para la primera fila (encabezados)
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']], // Texto en blanco
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['rgb' => '4CAF50'], // Verde oscuro
                ],
                'alignment' => ['horizontal' => 'center'],
            ],
        ];
    }

    /**
     * Ajustar el ancho de las columnas
     */
    public function columnWidths(): array
    {
        return [
            'A' => 15,  // Folio
            'B' => 20,  // Fecha de Aplicación
            'C' => 20,  // Fecha de Reporte
            'D' => 10,  // Área
            'E' => 10,  // Sistema
            'F' => 20,  // Tipo de Reporte
            'G' => 30,  // Usuario que realizó el reporte
            'H' => 45,  // Descripción
            'I' => 30,  // Evidencia
            'J' => 15,  // Estado
        ];
    }
}
