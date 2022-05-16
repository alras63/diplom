<?php

namespace App\Nova\Actions;

use App\Request;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeImport;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use  \PhpOffice\PhpSpreadsheet\Style\Border;
use Illuminate\Support\Collection;

class ExportRequests extends DownloadExcel implements WithHeadings, WithEvents, WithStyles, WithColumnWidths
{
    // public function collection()
    // {
    //     return Request::all();
    // }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 50,
            'C' => 65,
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            'User',
            'Course',
            'Created at',
            'Updated at'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            'B' => ['alignment' => ['wrapText' => true]],
            'C' => ['alignment' => ['wrapText' => true]],

        ];
    }

    public function registerEvents(): array
    {
        return [

            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = "A1:W1"; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(11);

            },
        ];
    }
}
