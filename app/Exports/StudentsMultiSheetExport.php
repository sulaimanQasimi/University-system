<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StudentsMultiSheetExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $year;
    private $month;
    public function __construct(int $year)
    {
        $this->year=$year;
    }

    public function sheets():array
    {
        $sheets=[];
        for ($month=1;$month<=12;$month++){
            $sheets[]=new StudentsExport($this->year,$month);
        }


        return $sheets;
    }
}
