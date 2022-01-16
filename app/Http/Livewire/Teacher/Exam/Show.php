<?php

namespace App\Http\Livewire\Teacher\Exam;

use App\Models\ClassExam;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use PDFDD;


class Show extends Component
{

    public $examSelect=false;
    public $exam;
    protected $listeners=['TeacherExam'=>'show'];
    public $r=1;
    public function show(ClassExam $exam)
    {
        $this->exam=$exam;
        $this->examSelect=true;

    }

    public function download(ClassExam $exam)
    {
        PDFDD::SetCreator('');
        PDFDD::SetAuthor('Nicola Asuni');
        PDFDD::SetTitle('TCPDF Example 003');
        PDFDD::SetSubject('TCPDF Tutorial');
        PDFDD::SetKeywords('TCPDF, PDF, example, test, guide');

// set margins
        PDFDD::SetMargins(5, 45, 5);
        PDFDD::SetHeaderMargin(5);
        PDFDD::SetFooterMargin(5);

// set auto page breaks
        PDFDD::SetAutoPageBreak(TRUE, 5);
//
//
//// set some language-dependent strings (optional)
//if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
//    require_once(dirname(__FILE__) . '/lang/eng.php');
//    PDFDD::setLanguageArray($l);
//}

// set some language dependent data:
        $lg = Array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';

// set some language-dependent strings (optional)
        PDFDD::setLanguageArray($lg);

// ---------------------------------------------------------



        // add a page


        // Arabic and English content
        PDFDD::setHeaderCallback(function ($pdf){
//                    PDFDD::SetFont('aefurat', '', 11);
            // set font
            $pdf->SetFont('dejavusans', '', 15);
            $pdf->Cell(210, 10, 'پوهنتون کابل', false, true, 'C');
            $pdf->Cell(210, 10, '', false, true, 'C');

        });
        PDFDD::AddPage();
        PDFDD::SetFont('aefurat', '', 11);
        // set font
        PDFDD::SetFont('dejavusans', '', 11);

//                PDFDD::setRTL(true);

        PDFDD::Cell(20, 7, 'دیپارتمنت', true, false, 'C');
        PDFDD::Cell(30, 7, '', true, false, 'C');
        PDFDD::Cell(20, 7, 'صنف', true, false, 'C');
        PDFDD::Cell(30, 7, '', true, false, 'C');
        PDFDD::Cell(20, 7, 'سمستر', true, false, 'C');
        PDFDD::Cell(35, 7, '', true, true, 'C');
        /***************************************************************/


        // Arabic and English content
        PDFDD::Cell(20, 7, 'مضمون', true, false, 'C');
        PDFDD::Cell(30, 7, '', true, false, 'C');
        PDFDD::Cell(20, 7, 'کریدت', true, false, 'C');
        PDFDD::Cell(30, 7, '', true, false, 'C');
        PDFDD::Cell(20, 7, 'استاد', true, false, 'C');
        PDFDD::Cell(35, 7, '', true, true, 'C');
        /***************************************************************/

        PDFDD::Cell(20, 7, 'تاریخ', true, false, 'C');
        PDFDD::Cell(30, 7, '', true, false, 'C');
        PDFDD::Cell(20, 7, 'ساعت', true, false, 'C');
        PDFDD::Cell(30, 7, '', true, false, 'C');
        PDFDD::Cell(20, 7, 'امتحان', true, false, 'C');
        PDFDD::Cell(35, 7, 'فاینل', true, true, 'C');
        /*******************************************************************************/
        PDFDD::setRTL(false);
        PDFDD::SetFont('helvetica', '', 12);
        $style = array(
            'border' => 0,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(255, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        PDFDD::write2DBarcode('www.tcpdf.org', 'QRCODE,L', 10, 40, 30, 30, $style, 'N');
        /***************************************************************/
        PDFDD::Ln(10);
        PDFDD::SetFont('dejavusans', '', 8);
        PDFDD::setRTL(true);
        PDFDD::Cell(9, 7, '#', true, false, 'C');
        PDFDD::Cell(30, 7, 'اسم', true, false, 'C');
        PDFDD::Cell(30, 7, 'ولد', true, false, 'C');
        PDFDD::Cell(20, 7, 'کارخانه گی', true, false, 'C');
        PDFDD::Cell(20, 7, 'فعالیت صنفی', true, false, 'C');
        PDFDD::Cell(20, 7, 'نمره %20', true, false, 'C');
        PDFDD::Cell(20, 7, 'نمره %60', true, false, 'C');
        PDFDD::Cell(30, 7, 'مجموعه', true, false, 'C');
        PDFDD::Cell(20, 7, 'نتیجه', true, true, 'C');
//        $students=Student::all();
        $i=1;
        foreach($exam->Examstudents as $student) {
            PDFDD::SetFont('dejavusans', '', 8);
            PDFDD::setRTL(true);
            PDFDD::Cell(9, 7, $i, true, false, 'C');
            PDFDD::Cell(30, 7, $student->student->firstname, true, false, 'C');
            PDFDD::Cell(30, 7, $student->student->fathername, true, false, 'C');
            PDFDD::Cell(20, 7, '', true, false, 'C');
            PDFDD::Cell(20, 7, '', true, false, 'C');
            PDFDD::Cell(20, 7, '', true, false, 'C');
            PDFDD::Cell(20, 7, '', true, false, 'C');
            PDFDD::Cell(30, 7, '', true, false, 'C');
            PDFDD::Cell(20, 7, '', true, true, 'C');
            /***************************************************************/
            //PDFDD::SetFont('dejavusans', '', 11);
            $i++;
        }

        // set font
        PDFDD::setRTL(true);
        //Close and output PDF document

       Storage::disk('public')->put('mao.pdf',PDFDD::Output('example_003.pdf'));



    }

    public function render()
    {
        return view('livewire.teacher.exam.show');
    }
}
