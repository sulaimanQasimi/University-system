<?php

namespace App\Exports;

use App\Student;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class StudentsExport implements
    WithStyles,
    FromQuery,
    Responsable,
    WithHeadings,
    WithProperties,
    WithEvents,
    WithTitle,
    WithColumnWidths
{
    use Exportable;
    private $fileName = 'Students.xlsx';
    /**
     * @return \Illuminate\Support\Collection
     */

    private $year;
    private $month;

    public function __construct(int $year, int $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    /*
        public function collection()
        {
            return \App\Models\Student::all();

        }*/
    public function query()
    {
        return \App\Models\Student::query()->whereYear('created_at', $this->year)->whereMonth('created_at', $this->month);


        // TODO: Implement query() method.
    }

    public function headings(): array
    {
        return [
            'نام',
            'تخلص',
            'ولد',
            'نام پدرکلان',
            'سمستر',
            'تاریخ تولد',
            'تلفن',
            'آدرس',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            1 => ['font' => ['size' => 16]],
            1 => ['borders' => ['outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                'color' => ['argb' => 'FFFF0000'],

            ],

            ],
            ]


        ];
    }

    public function properties(): array
    {
        return [
            'creator' => 'پوهنتون کابل',
            'lastModifiedBy' => 'پوهنتون کابل',
            'title' => 'لست محصلین',
            'description' => 'Latest Invoices',
            'subject' => 'Invoices',
            'keywords' => 'invoices,export,spreadsheet',
            'category' => 'Invoices',
            'manager' => 'Patrick Brouwers',
            'company' => 'پوهنتون کابل',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }

    public function title(): string
    {
        // TODO: Implement title() method.
        return \DateTime::createFromFormat('!m', $this->month)->format('F');
    }

    public function columnWidths(): array
    {
        // TODO: Implement columnWidths() method.
        return [
            'A' => 6,
            'B' => 6,
            'C' => 55,
            'D' => 55,
            'E' => 55,
            'F' => 55,
            'G' => 55,
            'H' => 55,
            'I' => 55,
            'J' => 55,
            'K' => 55,
            'L' => 55,
            'M' => 55,
            'N' => 55,
            'O' => 55,
            'P' => 55,
        ];
    }
}
