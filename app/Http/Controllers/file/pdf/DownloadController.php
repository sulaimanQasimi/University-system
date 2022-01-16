<?php

namespace App\Http\Controllers\file\pdf;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Classes;
use App\Models\ClassExam;
use App\Models\ClassRoom;
use App\Models\College;
use App\Models\Student;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use PDFDD;

class DownloadController extends Controller
{
    private $creator;
    private $autor;
    private $title;
    private $subject;
    private $app_logo;
    private $head_logo;
    private $value;

    /*
     * @private /**
     * @param string $creator
     * @param /**
     * @param mixed $app_logo
       */
    public function __construct()
    {
        $this->creator = "S.Q Service Company";
        $this->autor = "Sulaiman Qasimi";
        $this->app_logo = env('APP_LOGO');
        $this->head_logo = env('Head_LOGO');
    }

    private function header(string $title)
    {
        $this->title = Str::upper($title);
        PDFDD::setHeaderCallback(function ($pdf) {
            $pdf->SetFont('dejavusans', '', 14);
            $pdf->Cell(210, 10, env('APP_NAME'), false, true, 'C');
            $pdf->Cell(210, 10, __($this->title), false, true, 'C');
            $pdf->SetFont('helvetica', '', 10);
            $style = array(
                'position' => '',
                'align' => 'C',
                'stretch' => false,
                'fitwidth' => true,
                'cellfitalign' => '',
                'border' => false,
                'hpadding' => 'auto',
                'vpadding' => 'auto',
                'fgcolor' => array(0, 0, 0),
                'bgcolor' => false, //array(255,255,255),
                'text' => false,
                'font' => 'helvetica',
                'fontsize' => 4,
                'stretchtext' => 4
            );
            $pdf->Cell(60, 0, '');
            $pdf->write1DBarcode(time(), 'C39', '', '', '', 14, 0.4, $style, 'N');
            /*
             * DO not edit logo in here you can edit this in config/university.php
             * file
             *
             * You can also enable or disable logo in config/university/file/logo
             * */
            if (config('university.file.logo')) {
                $pdf->Image(env('APP_LOGO'), config('university.file.first.y'), config('university.file.first.x'), config('university.file.first.width'), config('university.file.first.width'));
                $pdf->Image(env('HEAD_LOGO'), config('university.file.second.y'), config('university.file.second.x'), config('university.file.second.width'), config('university.file.second.width'));
            }

        });


    }

    private function footer()
    {
        PDFDD::setFooterCallback(function ($pdf) {
            $pdf->SetFont('dejavusans', '', 7);
            PDFDD::Cell(275, 7, __("file.printed_by", ["name" => auth()->user()->name]), false, true, 'L');

        });

    }

    public function setAppLogo($app_logo)
    {
        $this->app_logo = $app_logo;
    }
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }


    public function exam_list($id)
    {
        $exam = ClassExam::query()->findOrFail($id);
        $this->authorize('view',$exam);
        PDFDD::SetMargins(5, 45, 5);
        PDFDD::SetHeaderMargin(5);
        PDFDD::SetFooterMargin(5);
        PDFDD::SetAutoPageBreak(TRUE, 10);
        $this->header('exam list');
        $this->footer();
        $students = $exam->Examstudents;
        PDFDD::AddPage();
        PDFDD::SetFont('aefurat', '', 11);
        PDFDD::SetFont('dejavusans', '', 11);
        PDFDD::Cell(45, 7, trans('DEPARTMENT'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->classroom->college->department->name, true, false, 'C');
        PDFDD::Cell(45, 7, trans('COLLEGE'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->classroom->college->name, true, true, 'C');
        PDFDD::Cell(45, 7, trans('CLASS'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->classroom->name, true, false, 'C');
        PDFDD::Cell(45, 7, trans('GRADE'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->classroom->grade, true, true, 'C');

        PDFDD::Cell(45, 7, trans('SUBJECT'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->subject->name, true, false, 'C');
        PDFDD::Cell(45, 7, trans('CREDIT'), true, false, 'C');
        PDFDD::Cell(55, 7, '', true, true, 'C');

        PDFDD::Cell(45, 7, trans('TEACHER'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->teacher->full_name, true, false, 'C');

        PDFDD::Cell(45, 7, trans('DATE'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->dates, true, true, 'C');
        PDFDD::Cell(45, 7, trans('TIME'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->time, true, false, 'C');
        PDFDD::Cell(45, 7, trans('TYPE'), true, false, 'C');
        PDFDD::Cell(55, 7, '', true, true, 'C');

        PDFDD::SetFont('helvetica', '', 12);
        PDFDD::Ln(10);
        PDFDD::SetFont('dejavusans', '', 8);
        PDFDD::Cell(9, 5, '#', true, false, 'C');
        PDFDD::Cell(30, 5, trans("NAME"), true, false, 'C');
        PDFDD::Cell(30, 5, trans('FATHER NAME'), true, false, 'C');
        PDFDD::Cell(20, 5, trans('HOME WORK'), true, false, 'C');
        PDFDD::Cell(20, 5, trans('CLASS ACTIVITY'), true, false, 'C');
        PDFDD::Cell(20, 5, trans('MIDTERM'), true, false, 'C');
        PDFDD::Cell(20, 5, trans('FINAL'), true, false, 'C');
        PDFDD::Cell(30, 5, trans('TOTAL'), true, false, 'C');
        PDFDD::Cell(20, 5, trans('RESULT'), true, true, 'C');
        $i = 1;
        foreach ($students as $student) {
            PDFDD::SetFont('dejavusans', '', 8);

            PDFDD::Cell(9, 5, $i, true, false, 'C');
            PDFDD::Cell(30, 5, $student->student->firstname, true, false, 'C');
            PDFDD::Cell(30, 5, $student->student->fathername, true, false, 'C');
            PDFDD::Cell(20, 5, $student->homework, true, false, 'C');
            PDFDD::Cell(20, 5, $student->classActivity, true, false, 'C');
            PDFDD::Cell(20, 5, $student->mid, true, false, 'C');
            PDFDD::Cell(20, 5, $student->final, true, false, 'C');
            PDFDD::Cell(30, 5, $student->total_marks, true, false, 'C');
            PDFDD::Cell(20, 5, $student->result, true, true, 'C');
            $i++;
        }
        PDFDD::Output(uniqid('STUDENT LIST') . '.pdf', config('university.file.mode'));
    }

    public function exam_list_empty($id)
    {
        $exam = ClassExam::query()->findOrFail($id);
        $this->authorize('view',$exam);
        // set margins
        PDFDD::SetMargins(5, 45, 5);
        PDFDD::SetHeaderMargin(5);
        PDFDD::SetFooterMargin(5);


        // set auto page breaks
        PDFDD::SetAutoPageBreak(TRUE, 10);
        /*
         *
         * Page header
         * */
        PDFDD::setHeaderCallback(function ($pdf) {
            $pdf->SetFont('dejavusans', '', 14);
            $pdf->Cell(210, 10, env('APP_NAME'), false, true, 'C');
            $pdf->Cell(210, 10, __('STUDENT LIST'), false, true, 'C');
            $pdf->SetFont('helvetica', '', 10);
            $style = array(
                'position' => '',
                'align' => 'C',
                'stretch' => false,
                'fitwidth' => true,
                'cellfitalign' => '',
                'border' => false,
                'hpadding' => 'auto',
                'vpadding' => 'auto',
                'fgcolor' => array(0, 0, 0),
                'bgcolor' => false, //array(255,255,255),
                'text' => false,
                'font' => 'helvetica',
                'fontsize' => 4,
                'stretchtext' => 4
            );
            $pdf->Cell(60, 0, '');
            $pdf->write1DBarcode(time(), 'C39', '', '', '', 14, 0.4, $style, 'N');
            /*
             * DO not edit logo in here you can edit this in config/university.php
             * file
             *
             * You can also enable or disable logo in config/university/file/logo
             * */
            if (config('university.file.logo')) {
                $pdf->Image(env('APP_LOGO'), config('university.file.first.y'), config('university.file.first.x'), config('university.file.first.width'), config('university.file.first.width'));
                $pdf->Image(env('HEAD_LOGO'), config('university.file.second.y'), config('university.file.second.x'), config('university.file.second.width'), config('university.file.second.width'));
            }


        });
        /*
         *
         * Page footer
         * */
        PDFDD::setFooterCallback(function ($pdf) {
            $pdf->SetFont('dejavusans', '', 7);
            PDFDD::Cell(275, 7, __("file.printed_by", ["name" => auth()->user()->name]), false, true, 'L');

        });
        $students = $exam->Examstudents;
        PDFDD::AddPage();
        PDFDD::SetFont('aefurat', '', 11);
        PDFDD::SetFont('dejavusans', '', 11);
        PDFDD::Cell(45, 7, trans('DEPARTMENT'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->classroom->college->department->name, true, false, 'C');
        PDFDD::Cell(45, 7, trans('COLLEGE'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->classroom->college->name, true, true, 'C');

        PDFDD::Cell(45, 7, trans('CLASS'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->classroom->name, true, false, 'C');
        PDFDD::Cell(45, 7, trans('GRADE'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->classroom->grade, true, true, 'C');

        PDFDD::Cell(45, 7, trans('SUBJECT'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->subject->name, true, false, 'C');
        PDFDD::Cell(45, 7, trans('CREDIT'), true, false, 'C');
        PDFDD::Cell(55, 7, '', true, true, 'C');
        PDFDD::Cell(45, 7, trans('TEACHER'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->teacher->full_name, true, false, 'C');
        PDFDD::Cell(45, 7, trans('DATE'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->dates, true, true, 'C');
        PDFDD::Cell(45, 7, trans('TIME'), true, false, 'C');
        PDFDD::Cell(55, 7, $exam->time, true, false, 'C');
        PDFDD::Cell(45, 7, trans('TYPE'), true, false, 'C');
        PDFDD::Cell(55, 7, '', true, true, 'C');
        PDFDD::SetFont('helvetica', '', 12);
        PDFDD::Ln(10);
        PDFDD::SetFont('dejavusans', '', 8);
        PDFDD::Cell(9, 5, '#', true, false, 'C');
        PDFDD::Cell(30, 5, trans("NAME"), true, false, 'C');
        PDFDD::Cell(30, 5, trans('FATHER NAME'), true, false, 'C');
        PDFDD::Cell(20, 5, trans('HOME WORK'), true, false, 'C');
        PDFDD::Cell(20, 5, trans('CLASS ACTIVITY'), true, false, 'C');
        PDFDD::Cell(20, 5, trans('MIDTERM'), true, false, 'C');
        PDFDD::Cell(20, 5, trans('FINAL'), true, false, 'C');
        PDFDD::Cell(30, 5, trans('TOTAL'), true, false, 'C');
        PDFDD::Cell(20, 5, trans('RESULT'), true, true, 'C');
        $i = 1;
        foreach ($students as $student) {
            PDFDD::SetFont('dejavusans', '', 8);
            PDFDD::Cell(9, 5, $i, true, false, 'C');
            PDFDD::Cell(30, 5, $student->student->firstname, true, false, 'C');
            PDFDD::Cell(30, 5, $student->student->fathername, true, false, 'C');
            PDFDD::Cell(20, 5, '', true, false, 'C');
            PDFDD::Cell(20, 5, '', true, false, 'C');
            PDFDD::Cell(20, 5, '', true, false, 'C');
            PDFDD::Cell(20, 5, '', true, false, 'C');
            PDFDD::Cell(30, 5, '', true, false, 'C');
            PDFDD::Cell(20, 5, '', true, true, 'C');
            $i++;
        }
        PDFDD::Output(uniqid('Exam_') . '.pdf', config('university.file.mode'));
    }

    public function exam_paper($id)
    {
        $exam = ClassExam::query()->findOrFail($id);
        $this->authorize('view', $exam);
        $students = $exam->Examstudents;
        PDFDD::SetSubject('');
        PDFDD::SetKeywords('Sulaiman,Kabul University,0765993446');

// set margins
        PDFDD::SetMargins(5, 45, 5);
        PDFDD::SetHeaderMargin(5);
        PDFDD::SetFooterMargin(5);

// set auto page breaks
        PDFDD::SetAutoPageBreak(TRUE, 5);

        /*
         * Page header
         * */
        $this->header("exam paper");
        /*
         *Page footer
         * */
        $this->footer();

        foreach ($students as $student) {
            PDFDD::AddPage();
            PDFDD::SetFont('aefurat', '', 11);
            PDFDD::SetFont('dejavusans', '', 11);
            /*******************************************************************************/
            PDFDD::Cell(30, 7, trans("ID"), true, false, 'C');
            PDFDD::Cell(30, 7, $student->id, true, false, 'C');
            PDFDD::Cell(30, 7, trans("NAME"), true, false, 'C');
            PDFDD::Cell(30, 7, $student->student->firstname, true, false, 'C');
            PDFDD::Cell(30, 7, trans('FATHER NAME'), true, false, 'C');
            PDFDD::Cell(30, 7, $student->student->fathername, true, true, 'C');
            PDFDD::Cell(30, 7, trans("CLASS"), true, false, 'C');
            PDFDD::Cell(30, 7, $exam->classroom->name, true, false, 'C');
            PDFDD::Cell(30, 7, trans("TEACHER"), true, false, 'C');
            PDFDD::Cell(30, 7, $exam->teacher->firstname, true, false, 'C');
            PDFDD::Cell(30, 7, trans('SUBJECT'), true, false, 'C');
            PDFDD::Cell(30, 7, $exam->subject->name, true, true, 'C');

            /*******************************************************************************/

            PDFDD::Ln(10);
            PDFDD::SetFont('dejavusans', '', 8);

            if ($txt = $exam->question != null) {
                $txt = $exam->question->question;
            } else {
                $txt = '';
            }
            PDFDD::writeHTML($txt, true, false, true, false, '');
        }
        PDFDD::Output(uniqid('Exam_paper_') . '.pdf', config('university.file.mode'));
    }

    public function class_attendance($id)
    {
        $class = Classes::query()->findOrFail($id);

        // set document information
        $this->title = "Schedule ";
        PDFDD::SetCreator($this->creator);
        PDFDD::SetAuthor($this->autor);
        PDFDD::SetTitle($this->title);
        PDFDD::SetSubject($class->name);
        PDFDD::SetKeywords('Sulaiman,Kabul University,0765993446');
        PDFDD::setPageOrientation('L');

        // set default header data

// set header and footer fonts
        PDFDD::SetMargins(5, 45, 5);
        PDFDD::SetHeaderMargin(5);
        PDFDD::SetFooterMargin(5);

// set auto page breaks
        PDFDD::SetAutoPageBreak(TRUE, 5);

// set image scale factor

        // Arabic and English content
        PDFDD::setHeaderCallback(function ($pdf) {
            $pdf->Cell(297, 10, env("APP_NAME"), false, true, 'C');
            $pdf->Cell(297, 10, __('ATTENDANCE'), false, true, 'C');
            $pdf->SetFont('helvetica', '', 10);
            $pdf->Cell(107, 0, '');
            $style = array(
                'position' => '',
                'align' => 'C',
                'stretch' => false,
                'fitwidth' => true,
                'cellfitalign' => '',
                'border' => true,
                'hpadding' => 'auto',
                'vpadding' => 'auto',
                'fgcolor' => array(0, 0, 0),
                'bgcolor' => false, //array(255,255,255),
                'text' => true,
                'font' => 'helvetica',
                'fontsize' => 8,
                'stretchtext' => 4
            );

            $pdf->write1DBarcode(time(), 'C39', '', '', '', 14, 0.4, $style, 'N');
            /*
                    * DO not edit logo in here you can edit this in config/university.php
                    * file
                    *
                    * You can also enable or disable logo in config/university/file/logo
                    * */
            if (config('university.file.logo')) {
                $pdf->Image(env('APP_LOGO'), config('university.file.first.y'), config('university.file.first.x'), config('university.file.first.width'), config('university.file.first.width'));
                $pdf->Image(env('HEAD_LOGO'), config('university.file.second.y'), config('university.file.second.x'), config('university.file.second.width'), config('university.file.second.width'));
            }


        });
// add a page
        PDFDD::AddPage();

        PDFDD::SetFont('pdfatimesb', 'B', 11);

// Arabic and English content
        PDFDD::Cell(30, 7, trans_choice("menu.class", 1), true, false, 'C');
        PDFDD::Cell(45, 7, $class->name, true, false, 'C');
        PDFDD::Cell(30, 7, trans_choice("menu.subject", 1), true, false, 'C');
        PDFDD::Cell(45, 7, '', true, false, 'C');
        PDFDD::Cell(30, 7, trans_choice("menu.teacher", 1), true, false, 'C');
        PDFDD::Cell(30, 7, '', true, false, 'C');
        /***************************************************************/

        PDFDD::Cell(30, 7, __('schedule.credit'), true, false, 'C');
        PDFDD::Cell(38, 7, '', true, true, 'C');
        PDFDD::SetFont('pdfatimesb', '', 11);

        PDFDD::Ln(10);
        PDFDD::Cell(9, 7, '#', true, false, 'C');
        PDFDD::Cell(30, 7, __('property.name'), true, false, 'C');
        PDFDD::Cell(30, 7, __('property.f_name'), true, false, 'C');
        for ($j = 1; $j < 30; $j++) {
            PDFDD::Cell(7, 7, $j, true, false, 'C');

        }
        $i = 1;
        $students = $class->classStudents;
        PDFDD::Cell(7, 7, 30, true, true, 'C');
        foreach ($students as $student) {
            PDFDD::Cell(9, 7, $i, true, false, 'C');
            PDFDD::Cell(30, 7, $student->student->firstname, true, false, 'C');
            PDFDD::Cell(30, 7, $student->student->fathername, true, false, 'C');
            for ($j = 1; $j < 30; $j++) {
                PDFDD::Cell(7, 7, '', true, false, 'C');

            }
            $i++;
            PDFDD::Cell(7, 7, '', true, true, 'C');

        }


        return PDFDD::Output('Attendance.pdf', config('university.file.mode'));
    }

    public function class_list($id)
    {
        $this->title = "List of Student";
        $class = Classes::query()->findOrFail($id);
        PDFDD::SetMargins(5, 45, 5);
        PDFDD::SetHeaderMargin(5);
        PDFDD::SetFooterMargin(5);

        PDFDD::SetAutoPageBreak(TRUE, 5);

      $this->header("class list");
      $this->footer();
        PDFDD::AddPage();
        PDFDD::SetFont('kozgopromedium', '', 9);
        PDFDD::Cell(30, 7, trans_choice("CLASS", 1), true, false, 'C');
        PDFDD::Cell(45, 7, $class->name, true, false, 'C');
        PDFDD::Cell(30, 7, trans("COLLEGE", 1), true, false, 'C');
        PDFDD::Cell(45, 7, $class->college->name, true, false, 'C');
        PDFDD::Cell(49, 7, $class->college->department->name, true, true, 'C');
        PDFDD::Ln(10);
        PDFDD::Cell(9, 7, '#', true, false, 'C');
        PDFDD::Cell(30, 7, trans('NAME'), true, false, 'C');
        PDFDD::Cell(30, 7, trans('LAST NAME'), true, false, 'C');
        PDFDD::Cell(30, 7, trans('FATHER NAME'), true, false, 'C');
        PDFDD::Cell(30, 7, trans('GRAND FATHER NAME'), true, false, 'C');
        PDFDD::Cell(70, 7, trans('EMAIL'), true, true, 'C');
        $i = 1;
        $students = $class->classStudents;
        foreach ($students as $student) {
            PDFDD::Cell(9, 7, $i, true, false, 'C');
            PDFDD::Cell(30, 7, $student->student->firstname, true, false, 'C');
            PDFDD::Cell(30, 7, $student->student->lastname, true, false, 'C');
            PDFDD::Cell(30, 7, $student->student->fathername, true, false, 'C');
            PDFDD::Cell(30, 7, $student->student->grandfathername, true, false, 'C');
            if ($student->student->user != null) {
                PDFDD::Cell(70, 7, $student->student->user->email, true, true, 'C');
            } else {

                PDFDD::Cell(70, 7, 'N/A', true, true, 'C');
            }
            $i++;
        }

        return PDFDD::Output('class_list.pdf', 'D');
    }

    public function college_list()
    {
        $departments = College::all();
        PDFDD::SetCreator('Kabul University');
        PDFDD::SetAuthor(uniqid('user_'));
        PDFDD::SetTitle(trans('College'));
        PDFDD::SetSubject('لیست دیپارتمنت');
        PDFDD::SetKeywords('پوهنتون کابل');
        PDFDD::SetMargins(5, 45, 5);
        PDFDD::SetHeaderMargin(5);
        PDFDD::SetFooterMargin(5);
        PDFDD::SetAutoPageBreak(TRUE, 5);
        $lg = Array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        PDFDD::setLanguageArray($lg);

        PDFDD::setHeaderCallback(function ($pdf) {
            $lg = Array();
            $lg['a_meta_charset'] = 'UTF-8';
            $lg['a_meta_dir'] = 'rtl';
            $lg['a_meta_language'] = 'fa';
            $lg['w_page'] = 'page';
            $pdf->setLanguageArray($lg);
            $pdf->SetFont('dejavusans', '', 14);
            $pdf->setRTL(true);
            $pdf->Cell(210, 10, 'پوهنتون کابل', false, true, 'C');
            $pdf->Cell(210, 10, 'لیست دیپارتمنت ها', false, true, 'C');

            $pdf->Image('storage/application/kabul.PNG', 175, 10, 20, 20);
            $pdf->Image('storage/application/ministry of education.jpg', 10, 10, 20, 20);

        });
        PDFDD::AddPage();
        $lg = Array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        // set some language-dependent strings (optional)
        PDFDD::setLanguageArray($lg);
        PDFDD::SetFont('dejavusans', '', 11);


        PDFDD::setRTL(true);
        $i = 1;
        PDFDD::Cell(20, 7, '#', true, false, 'C');
        PDFDD::Cell(70, 7, 'دیپارتمنت', true, false, 'C');
        PDFDD::Cell(70, 7, 'پوهنځی', true, false, 'C');
        PDFDD::Cell(30, 7, 'ایدی', true, true, 'C');
        foreach ($departments as $department) {
            PDFDD::Cell(20, 7, $i, true, false, 'C');
            PDFDD::Cell(70, 7, $department->name, true, false, 'C');
            PDFDD::Cell(70, 7, $department->department->name, true, false, 'C');
            PDFDD::Cell(30, 7, $department->id, true, true, 'C');
            $i++;
        }
        PDFDD::Output(uniqid('Exam_') . '.pdf', 'D');


    }

    public function schedule($id)
    {
        $this->title = trans('SCHEDULE');

        $class = ClassRoom::query()->findOrFail($id);
        PDFDD::SetCreator($this->creator);
        PDFDD::SetAuthor($this->autor);
        PDFDD::SetTitle($this->title);
        PDFDD::SetSubject($class->name);
        PDFDD::SetKeywords('Sulaiman,Kabul University,0765993446');
        PDFDD::SetMargins(5, 45, 5);
        PDFDD::SetHeaderMargin(5);
        PDFDD::SetFooterMargin(10);

        PDFDD::SetAutoPageBreak(TRUE, 5);
        PDFDD::setPageOrientation('L');

        // set image scale factor

        // Arabic and English content
        PDFDD::setHeaderCallback(function ($pdf) {


            $pdf->SetFont('dejavusans', '', 14);
            $pdf->SetFont('pdfahelveticai', '', 14);
            $pdf->Cell(265, 10, env("APP_NAME"), false, true, 'C');
            $pdf->Cell(265, 10, __("file.schedule"), false, true, 'C');

            $pdf->Image($this->app_logo, 10, 10, 20, 20);
            $pdf->Image($this->head_logo, 265, 10, 20, 20);
        });
        PDFDD::setFooterCallback(function ($pdf) {

            $pdf->SetFont('pdfahelveticai', '', 8);
            $pdf->Cell(265, 10, __("file.printed_by", ['name' => auth()->user()->name]), false, true, 'L');

        });
        PDFDD::AddPage();
        PDFDD::SetFont('aefurat', '', 11);
        PDFDD::SetFont('dejavusans', '', 11);
        PDFDD::Cell(30, 10, trans_choice('menu.class', 1), true, false, 'C');
        PDFDD::Cell(71, 10, $class->name, true, false, 'C');
        PDFDD::Cell(40, 10, trans_choice('menu.sub_department', 1), true, false, 'C');
        PDFDD::Cell(30, 10, $class->department->name, true, false, 'C');
        PDFDD::Cell(30, 10, $class->department->department->name, true, false, 'C');
        PDFDD::Cell(30, 10, __('property.grade'), true, false, 'C');
        PDFDD::Cell(54, 10, $class->grade, true, true, 'C');
        PDFDD::Ln(10);
        PDFDD::Cell(31.67, 15, __("date.day"), true, false, 'C');

        PDFDD::Cell(31.67, 15, __("schedule.credit_num", ['number' => __('number.first')]), true, false, 'C');
        PDFDD::Cell(31.67, 15, __("schedule.credit_num", ['number' => __('number.second')]), true, false, 'C');
        PDFDD::Cell(31.67, 15, __("schedule.credit_num", ['number' => __('number.third')]), true, false, 'C');
        PDFDD::Cell(31.67, 15, __("schedule.credit_num", ['number' => __('number.forth')]), true, false, 'C');
        PDFDD::Cell(31.67, 15, __("schedule.credit_num", ['number' => __('number.fifth')]), true, false, 'C');
        PDFDD::Cell(31.67, 15, __("schedule.credit_num", ['number' => __('number.sixth')]), true, false, 'C');
        PDFDD::Cell(31.67, 15, __("schedule.credit_num", ['number' => __('number.seventh')]), true, false, 'C');
        PDFDD::Cell(31.67, 15, __("schedule.credit_num", ['number' => __('number.eighth')]), true, true, 'C');
        $day = [
            1 => [
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => '',

            ],
            2 => [
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => '',

            ],
            3 => [
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => '',

            ],
            4 => [
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => '',

            ],
            5 => [
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => '',

            ],
            6 => [
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => '',

            ],
            7 => [
                1 => '',
                2 => '',
                3 => '',
                4 => '',
                5 => '',
                6 => '',
                7 => '',
                8 => '',

            ],

        ];
        foreach ($class->classSchedules()->orderBy('day', 'asc')->get() as $schedule) {
            switch ($schedule->day) {
                case 1:
                    switch ($schedule->period) {
                        case 1:
                            $day[1][1] = $schedule->subject->name;


                            break;
                        case 2:

                            $day[1][2] = $schedule->subject->name;

                            break;
                        case 3:

                            $day[1][3] = $schedule->subject->name;
                            break;
                        case 4:

                            $day[1][4] = $schedule->subject->name;

                            break;
                        case 5:

                            $day[1][5] = $schedule->subject->name;

                            break;
                        case 6:

                            $day[1][6] = $schedule->subject->name;
                            break;
                        case 7:

                            $day[1][7] = $schedule->subject->name;
                            break;
                        case 8:

                            $day[1][8] = $schedule->subject->name;

                            break;
                        default :
                    }


                    break;
                case 2:
                    switch ($schedule->period) {
                        case 1:
                            $day[2][1] = $schedule->subject->name;


                            break;
                        case 2:

                            $day[2][2] = $schedule->subject->name;

                            break;
                        case 3:

                            $day[2][3] = $schedule->subject->name;
                            break;
                        case 4:

                            $day[2][4] = $schedule->subject->name;

                            break;
                        case 5:

                            $day[2][5] = $schedule->subject->name;

                            break;
                        case 6:

                            $day[2][6] = $schedule->subject->name;
                            break;
                        case 7:

                            $day[2][7] = $schedule->subject->name;
                            break;
                        case 8:

                            $day[2][8] = $schedule->subject->name;

                            break;
                        default :
                    }

                    break;
                case 3:
                    switch ($schedule->period) {
                        case 1:
                            $day[3][1] = $schedule->subject->name;


                            break;
                        case 2:

                            $day[3][2] = $schedule->subject->name;

                            break;
                        case 3:

                            $day[3][3] = $schedule->subject->name;
                            break;
                        case 4:

                            $day[3][4] = $schedule->subject->name;

                            break;
                        case 5:

                            $day[3][5] = $schedule->subject->name;

                            break;
                        case 6:

                            $day[3][6] = $schedule->subject->name;
                            break;

                        case 7:

                            $day[3][7] = $schedule->subject->name;
                            break;
                        case 8:

                            $day[3][8] = $schedule->subject->name;

                            break;
                        default :
                    }


                    break;
                case 4:
                    switch ($schedule->period) {
                        case 1:
                            $day[4][1] = $schedule->subject->name;


                            break;
                        case 2:

                            $day[4][2] = $schedule->subject->name;

                            break;
                        case 3:

                            $day[4][3] = $schedule->subject->name;
                            break;
                        case 4:

                            $day[4][4] = $schedule->subject->name;

                            break;
                        case 5:

                            $day[4][5] = $schedule->subject->name;

                            break;
                        case 6:

                            $day[4][6] = $schedule->subject->name;

                            break;

                        case 7:

                            $day[4][7] = $schedule->subject->name;
                            break;
                        case 8:

                            $day[4][8] = $schedule->subject->name;

                            break;
                        default :
                    }

                    break;
                case 5:
                    switch ($schedule->period) {
                        case 1:
                            $day[5][1] = $schedule->subject->name;


                            break;
                        case 2:

                            $day[5][2] = $schedule->subject->name;

                            break;
                        case 3:

                            $day[5][3] = $schedule->subject->name;
                            break;
                        case 4:

                            $day[5][4] = $schedule->subject->name;

                            break;
                        case 5:

                            $day[5][5] = $schedule->subject->name;

                            break;
                        case 6:

                            $day[5][6] = $schedule->subject->name;

                            break;

                        case 7:

                            $day[5][7] = $schedule->subject->name;
                            break;
                        case 8:

                            $day[5][8] = $schedule->subject->name;

                            break;
                        default :
                    }

                    break;
                case 6:
                    switch ($schedule->period) {
                        case 1:
                            $day[6][1] = $schedule->subject->name;


                            break;
                        case 2:

                            $day[6][2] = $schedule->subject->name;

                            break;
                        case 3:

                            $day[6][3] = $schedule->subject->name;
                            break;
                        case 4:

                            $day[6][4] = $schedule->subject->name;

                            break;
                        case 5:

                            $day[6][5] = $schedule->subject->name;

                            break;
                        case 6:

                            $day[6][6] = $schedule->subject->name;

                            break;

                        case 7:

                            $day[6][7] = $schedule->subject->name;
                            break;
                        case 8:

                            $day[6][8] = $schedule->subject->name;

                            break;
                        default :
                    }

                    break;
                case 7:
                    switch ($schedule->period) {
                        case 1:
                            $day[7][1] = $schedule->subject->name;


                            break;
                        case 2:

                            $day[7][2] = $schedule->subject->name;

                            break;
                        case 3:

                            $day[7][3] = $schedule->subject->name;
                            break;
                        case 4:

                            $day[7][4] = $schedule->subject->name;

                            break;
                        case 5:

                            $day[7][5] = $schedule->subject->name;

                            break;
                        case 6:

                            $day[7][6] = $schedule->subject->name;

                            break;

                        case 7:

                            $day[7][7] = $schedule->subject->name;
                            break;
                        case 8:

                            $day[7][8] = $schedule->subject->name;

                            break;
                        default :
                    }

                    break;
            }
        }
        //Saturday
        PDFDD::Cell(31.67, 15, __('date.saturday'), true, false, 'C');

        PDFDD::SetFont('aefurat', '', 8);
        PDFDD::Cell(31.67, 15, $day[1][1], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[1][2], true, false, 'C');

        PDFDD::Cell(31.67, 15, $day[1][3], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[1][4], true, false, 'C');

        PDFDD::Cell(31.67, 15, $day[1][5], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[1][6], true, false, 'C');

        PDFDD::Cell(31.67, 15, $day[1][7], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[1][8], true, true, 'C');
        //Sunday
        PDFDD::SetFont('dejavusans', '', 11);
        PDFDD::Cell(31.67, 15, __('date.sunday'), true, false, 'C');

        PDFDD::SetFont('aefurat', '', 8);
        PDFDD::Cell(31.67, 15, $day[2][1], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[2][2], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[2][3], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[2][4], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[2][5], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[2][6], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[2][7], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[2][8], true, true, 'C');
        //monday
        PDFDD::SetFont('dejavusans', '', 11);
        PDFDD::Cell(31.67, 15, __('date.monday'), true, false, 'C');

        PDFDD::SetFont('aefurat', '', 8);
        PDFDD::Cell(31.67, 15, $day[3][1], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[3][2], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[3][3], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[3][4], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[3][5], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[3][6], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[3][7], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[3][8], true, true, 'C');
//tuesday
        PDFDD::SetFont('dejavusans', '', 11);
        PDFDD::Cell(31.67, 15, __('date.tuesday'), true, false, 'C');

        PDFDD::SetFont('aefurat', '', 8);
        PDFDD::Cell(31.67, 15, $day[4][1], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[4][2], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[4][3], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[4][4], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[4][5], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[4][6], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[4][7], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[4][8], true, true, 'C');
        //wednesday

        PDFDD::SetFont('dejavusans', '', 11);
        PDFDD::Cell(31.67, 15, __('date.wednesday'), true, false, 'C');

        PDFDD::SetFont('aefurat', '', 8);
        PDFDD::Cell(31.67, 15, $day[5][1], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[5][2], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[5][3], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[5][4], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[5][5], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[5][6], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[5][7], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[5][8], true, true, 'C');
        //thursday

        PDFDD::SetFont('dejavusans', '', 11);
        PDFDD::Cell(31.67, 15, __('date.thursday'), true, false, 'C');

        PDFDD::SetFont('aefurat', '', 8);
        PDFDD::Cell(31.67, 15, $day[6][1], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[6][2], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[6][3], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[6][4], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[6][5], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[6][6], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[6][7], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[6][8], true, true, 'C');
//friday

        PDFDD::SetFont('dejavusans', '', 11);
        PDFDD::Cell(31.67, 15, __('date.friday'), true, false, 'C');

        PDFDD::SetFont('aefurat', '', 8);
        PDFDD::Cell(31.67, 15, $day[7][1], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[7][2], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[7][3], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[7][4], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[7][5], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[7][6], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[7][7], true, false, 'C');
        PDFDD::Cell(31.67, 15, $day[7][8], true, true, 'C');

        return PDFDD::Output('class_Schedule.pdf', 'D');

    }

    public function student_profile($id)
    {
        $student = Student::query()->FindOrFail($id);
        $this->authorize('view', $student);

        $this->title = __("file.student_profile");
        PDFDD::SetCreator($this->creator);
        PDFDD::SetAuthor($this->autor);
        PDFDD::SetTitle($this->title);
        PDFDD::SetSubject('');
        PDFDD::SetKeywords('Sulaiman,Kabul University,0765993446');

// set margins
        PDFDD::SetMargins(5, 45, 5);
        PDFDD::SetHeaderMargin(5);
        PDFDD::SetFooterMargin(10);

// set auto page breaks
        PDFDD::SetAutoPageBreak(TRUE, 5);

        PDFDD::setHeaderCallback(function ($pdf) {
            $pdf->SetFont('dejavusans', '', 14);
            $pdf->Cell(210, 10, env('APP_NAME'), false, true, 'C');
            $pdf->Cell(210, 10, __('file.student_profile'), false, true, 'C');
            $pdf->SetFont('helvetica', '', 10);
            $style = array(
                'position' => '',
                'align' => 'C',
                'stretch' => false,
                'fitwidth' => true,
                'cellfitalign' => '',
                'border' => true,
                'hpadding' => 'auto',
                'vpadding' => 'auto',
                'fgcolor' => array(255, 0, 0),
                'bgcolor' => false, //array(255,255,255),
                'text' => true,
                'font' => 'helvetica',
                'fontsize' => 8,
                'stretchtext' => 4
            );
            $pdf->Cell(60, 0, '');
            $pdf->write1DBarcode(time(), 'C39', '', '', '', 14, 0.4, $style, 'N');
            $pdf->Image($this->app_logo, 175, 10, 20, 20);
            $pdf->Image($this->head_logo, 10, 10, 20, 20);

        });
        PDFDD::setFooterCallback(function ($pdf) {
            $pdf->SetFont('dejavusans', '', 7);
            PDFDD::Cell(275, 7, __("file.printed_by", ["name" => auth()->user()->name]), false, true, 'L');

        });

        PDFDD::AddPage();
        PDFDD::SetFont('aefurat', '', 11);
        PDFDD::SetFont('dejavusans', '', 11);

        PDFDD::Image('storage/' . $student->image, 160, 45, 40, 40);
        /***************************************************************/
        PDFDD::Cell(55, 7, __("property.name"), true, false, 'L');
        PDFDD::Cell(55, 7, $student->firstname, true, true, 'C');
        PDFDD::Cell(55, 7, __("property.lastname"), true, false, 'L');
        PDFDD::Cell(55, 7, $student->lastname, true, true, 'C');
        PDFDD::Cell(55, 7, __("property.f_name"), true, false, 'L');
        PDFDD::Cell(55, 7, $student->fathername, true, true, 'C');
        PDFDD::Cell(55, 7, __("property.g_name"), true, false, 'L');
        PDFDD::Cell(55, 7, $student->grandfathername, true, true, 'C');

        PDFDD::Cell(55, 7, __("property.date_birth"), true, false, 'L');
        PDFDD::Cell(55, 7, $student->dateofbirth, true, true, 'C');
        $age = Date::make($student->dateofbirth)->age;
        PDFDD::Ln(20);
        PDFDD::Cell(20, 7, __("property.sex"), true, false, 'C');
        if ($student->sex == 'F') {
            $sex = __("property.female");
        } else {
            $sex = __("property.male");
        }
        PDFDD::Cell(30, 7, $sex, true, false, 'C');
        PDFDD::Cell(30, 7, __("property.age"), true, false, 'C');
        PDFDD::Cell(30, 7, $age, true, false, 'C');
        PDFDD::Cell(40, 7, __("property.phone"), true, false, 'C');
        PDFDD::Cell(45, 7, $student->phone, true, true, 'C');
        if ($student->last_grade != null) {
            PDFDD::Cell(50, 7, __("student.current_class"), true, false, 'C');
            PDFDD::Cell(60, 7, $student->last_grade->name, true, false, 'C');
            PDFDD::Cell(40, 7, __("student.current_grade"), true, false, 'C');
            PDFDD::Cell(45, 7, $student->last_grade->grade, true, true, 'C');

        } else {

            PDFDD::Cell(20, 7, __("student.current_class"), true, false, 'C');
            PDFDD::Cell(110, 7, __("student.not_registered_class"), true, true, 'C');

        }
        PDFDD::Ln(10);
        PDFDD::Cell(50, 7, __("property.email"), true, false, 'C');
        PDFDD::Cell(60, 7, $student->user->email, true, false, 'C');

        PDFDD::Cell(40, 7, __("property.address"), true, false, 'C');
        PDFDD::Cell(45, 7, $student->address, true, true, 'C');


        PDFDD::Ln(15);
        PDFDD::Cell(50, 7, __("property.kankor"), true, false, 'C');
        PDFDD::Cell(60, 7, $student->kankor_id, true, false, 'C');
        PDFDD::Cell(40, 7, __("property.school"), true, false, 'C');
        PDFDD::Cell(45, 7, $student->school, true, true, 'C');

        PDFDD::Cell(50, 7, __("date.year"), true, false, 'C');
        PDFDD::Cell(60, 7, $student->year, true, false, 'C');
        PDFDD::Cell(40, 7, trans_choice('menu.sub_department', 1), true, false, 'C');
        PDFDD::Cell(45, 7, $student->department->name, true, true, 'C');

        /*******************************************************************************/
        PDFDD::AddPage();
        PDFDD::setPageOrientation('L');

        PDFDD::setHeaderCallback(function ($pdf) {

            $pdf->SetFont('dejavusans', '', 14);
            $pdf->Cell(275, 10, env("APP_NAME"), false, true, 'C');
            $pdf->Cell(275, 10, trans_choice('menu.class', 2), false, true, 'C');
            $pdf->SetFont('helvetica', '', 10);
            $style = array(
                'position' => '',
                'align' => 'C',
                'stretch' => false,
                'fitwidth' => true,
                'cellfitalign' => '',
                'border' => true,
                'hpadding' => 'auto',
                'vpadding' => 'auto',
                'fgcolor' => array(255, 0, 0),
                'bgcolor' => false, //array(255,255,255),
                'text' => true,
                'font' => 'helvetica',
                'fontsize' => 8,
                'stretchtext' => 4
            );
            $pdf->Cell(90, 0, '');
            $pdf->write1DBarcode(time(), 'C39', '', '', '', 14, 0.4, $style, 'N');
            $pdf->Image($this->app_logo, 275, 10, 20, 20);
            $pdf->Image($this->head_logo, 10, 10, 20, 20);

        });
        PDFDD::AddPage();
        PDFDD::setPageOrientation('L');
        PDFDD::Cell(10, 7, '', true, false, 'C');
        PDFDD::Cell(90, 7, trans_choice('menu.class', 1), true, false, 'C');
        PDFDD::Cell(90, 7, __('property.grade'), true, false, 'C');
        PDFDD::Cell(90, 7, __('date.date'), true, true, 'C');
        $i = 1;
        foreach ($student->classStudent as $class) {
            PDFDD::Cell(10, 7, $i, true, false, 'C');
            PDFDD::Cell(90, 7, $class->classes->name, true, false, 'C');
            PDFDD::Cell(90, 7, $class->classes->grade, true, false, 'C');
            PDFDD::Cell(90, 7, $class->classes->created_at, true, true, 'C');

            $i++;

        }
        PDFDD::Ln(10);
        PDFDD::setHeaderCallback(function ($pdf) {
            $pdf->SetFont('dejavusans', '', 14);
            $pdf->Cell(275, 10, env("APP_NAME"), false, true, 'C');
            $pdf->Cell(275, 10, trans_choice('menu.exam', 2), false, true, 'C');
            $pdf->SetFont('helvetica', '', 10);
            $style = array(
                'position' => '',
                'align' => 'C',
                'stretch' => false,
                'fitwidth' => true,
                'cellfitalign' => '',
                'border' => true,
                'hpadding' => 'auto',
                'vpadding' => 'auto',
                'fgcolor' => array(255, 0, 0),
                'bgcolor' => false, //array(255,255,255),
                'text' => true,
                'font' => 'helvetica',
                'fontsize' => 8,
                'stretchtext' => 4
            );
            $pdf->Cell(90, 0, '');
            $pdf->write1DBarcode(time(), 'C39', '', '', '', 14, 0.4, $style, 'N');
            $pdf->Image($this->app_logo, 275, 10, 20, 20);
            $pdf->Image($this->head_logo, 10, 10, 20, 20);
        });

        PDFDD::AddPage();
        PDFDD::setPageOrientation('L');
        $trans_class = trans_choice('menu.class', 1);
        $trans_subject = __('exam.subject');
        $trans_homework = __('exam.home_work');
        $trans_activity = __('exam.class_activity');
        $trans_mid = __('exam.midterm');
        $trans_final = __('exam.final');
        $trans_total = __('exam.total');
        $trans_result = __('exam.result');
        $trans_score = __('exam.score');
        $trans_time = __('exam.time');
        $trans_date = __('exam.date');
        $tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2">
<thead>
 <tr >
  <td width="30" rowspan="2" align="center"><b>#</b></td>
  <td width="140" rowspan="2" align="center"><b>{$trans_class}</b></td>
  <td width="385" align="center" colspan="5"><b>{$trans_score}</b></td>
  
  <td width="80" rowspan="2" valign="middle" align="center">{$trans_result}</td>
  <td width="80" rowspan="2" valign="middle" align="center">{$trans_date}</td>
  <td width="80" rowspan="2" valign="middle" align="center">{$trans_time}</td>
 </tr>
 <tr >
  <td width="75">{$trans_homework}</td>
  <td width="85">{$trans_activity}</td>
  <td width="75">{$trans_mid}</td>
  <td width="75">{$trans_final}</td>
  <td width="75">{$trans_total}</td>
  
  
 </tr>
</thead>
</table>
EOD;

        PDFDD::writeHTML($tbl, false, false, false, false, '');
        $i = 1;
        foreach ($student->examStudent()->orderBy('Student_class_id', 'desc')->get() as $exam) {
            $tbl =
                <<<EOD

                        <table border="1" cellpadding="2" cellspacing="2">
                        
                         <tr>
                          <td width="30" align="center" rowspan="3">$i</td>
                          <td width="140" align="center" valign="middle" rowspan="3">{$exam->exam->classes->name}</td>
                         
                          <td width="75">{$exam->homework}</td>
                          <td width="85">{$exam->classActivity}</td>
                          <td width="75">{$exam->mid}</td>
                          <td width="75">{$exam->final}</td>
                          <td width="75">{$exam->total_marks}</td>
                          <td width="80" rowspan="3" valign="middle" align="center">{$exam->result}</td>
                          <td width="80" rowspan="3" valign="middle" align="center">{$exam->exam->dates}</td>
                          <td width="80" rowspan="3" valign="middle" align="center">{$exam->exam->time}</td>
                         </tr>
                        </table>
EOD;

            PDFDD::writeHTML($tbl, false, false, false, false, '');
            $i++;
        }


        PDFDD::Output(uniqid('StudentProfile_') . '.pdf', 'D');
    }

    public function student_history($id)
    {
        $student = Student::query()->FindOrFail($id);
        $this->authorize('view', $student);

        $this->title = __("file.student_profile");
        PDFDD::SetCreator($this->creator);
        PDFDD::SetAuthor($this->autor);
        PDFDD::SetTitle($this->title);
        PDFDD::SetSubject('');
        PDFDD::SetKeywords('Sulaiman,Kabul University,0765993446');

// set margins
        PDFDD::SetMargins(5, 45, 5);
        PDFDD::SetHeaderMargin(5);
        PDFDD::SetFooterMargin(10);

// set auto page breaks
        PDFDD::SetAutoPageBreak(TRUE, 5);

        PDFDD::setHeaderCallback(function ($pdf) {
            $pdf->SetFont('dejavusans', '', 14);
            $pdf->Cell(210, 10, env('APP_NAME'), false, true, 'C');
            $pdf->Cell(210, 10, __('file.student_profile'), false, true, 'C');
            $pdf->SetFont('helvetica', '', 10);
            $style = array(
                'position' => '',
                'align' => 'C',
                'stretch' => false,
                'fitwidth' => true,
                'cellfitalign' => '',
                'border' => true,
                'hpadding' => 'auto',
                'vpadding' => 'auto',
                'fgcolor' => array(255, 0, 0),
                'bgcolor' => false, //array(255,255,255),
                'text' => true,
                'font' => 'helvetica',
                'fontsize' => 8,
                'stretchtext' => 4
            );
            $pdf->Cell(60, 0, '');
            $pdf->write1DBarcode(time(), 'C39', '', '', '', 14, 0.4, $style, 'N');
            $pdf->Image($this->app_logo, 175, 10, 20, 20);
            $pdf->Image($this->head_logo, 10, 10, 20, 20);

        });
        PDFDD::setFooterCallback(function ($pdf) {
            $pdf->SetFont('dejavusans', '', 7);
            PDFDD::Cell(275, 7, __("file.printed_by", ["name" => auth()->user()->name]), false, true, 'L');

        });

        PDFDD::AddPage();
        PDFDD::SetFont('aefurat', '', 11);
        PDFDD::SetFont('dejavusans', '', 11);

        PDFDD::Image('storage/' . $student->image, 160, 45, 40, 40);
        /***************************************************************/
        PDFDD::Cell(55, 7, __("property.name"), true, false, 'L');
        PDFDD::Cell(55, 7, $student->firstname, true, true, 'C');
        PDFDD::Cell(55, 7, __("property.lastname"), true, false, 'L');
        PDFDD::Cell(55, 7, $student->lastname, true, true, 'C');
        PDFDD::Cell(55, 7, __("property.f_name"), true, false, 'L');
        PDFDD::Cell(55, 7, $student->fathername, true, true, 'C');
        PDFDD::Cell(55, 7, __("property.g_name"), true, false, 'L');
        PDFDD::Cell(55, 7, $student->grandfathername, true, true, 'C');

        PDFDD::Cell(55, 7, __("property.date_birth"), true, false, 'L');
        PDFDD::Cell(55, 7, $student->dateofbirth, true, true, 'C');
        $age = Date::make($student->dateofbirth)->age;
        PDFDD::Ln(20);
        PDFDD::Cell(20, 7, __("property.sex"), true, false, 'C');
        if ($student->sex == 'F') {
            $sex = __("property.female");
        } else {
            $sex = __("property.male");
        }
        PDFDD::Cell(30, 7, $sex, true, false, 'C');
        PDFDD::Cell(30, 7, __("property.age"), true, false, 'C');
        PDFDD::Cell(30, 7, $age, true, false, 'C');
        PDFDD::Cell(40, 7, __("property.phone"), true, false, 'C');
        PDFDD::Cell(45, 7, $student->phone, true, true, 'C');
        if ($student->last_grade != null) {
            PDFDD::Cell(50, 7, __("student.current_class"), true, false, 'C');
            PDFDD::Cell(60, 7, $student->last_grade->name, true, false, 'C');
            PDFDD::Cell(40, 7, __("student.current_grade"), true, false, 'C');
            PDFDD::Cell(45, 7, $student->last_grade->grade, true, true, 'C');

        } else {

            PDFDD::Cell(20, 7, __("student.current_class"), true, false, 'C');
            PDFDD::Cell(110, 7, __("student.not_registered_class"), true, true, 'C');

        }
        PDFDD::Ln(10);
        PDFDD::Cell(50, 7, __("property.email"), true, false, 'C');
        PDFDD::Cell(60, 7, $student->user->email, true, false, 'C');

        PDFDD::Cell(40, 7, __("property.address"), true, false, 'C');
        PDFDD::Cell(45, 7, $student->address, true, true, 'C');


        PDFDD::Ln(15);
        PDFDD::Cell(50, 7, __("property.kankor"), true, false, 'C');
        PDFDD::Cell(60, 7, $student->kankor_id, true, false, 'C');
        PDFDD::Cell(40, 7, __("property.school"), true, false, 'C');
        PDFDD::Cell(45, 7, $student->school, true, true, 'C');

        PDFDD::Cell(50, 7, __("date.year"), true, false, 'C');
        PDFDD::Cell(60, 7, $student->year, true, false, 'C');
        PDFDD::Cell(40, 7, trans_choice('menu.sub_department', 1), true, false, 'C');
        PDFDD::Cell(45, 7, $student->department->name, true, true, 'C');

        /*******************************************************************************/
        PDFDD::AddPage();
        PDFDD::setPageOrientation('L');

        PDFDD::setHeaderCallback(function ($pdf) {

            $pdf->SetFont('dejavusans', '', 14);
            $pdf->Cell(275, 10, env("APP_NAME"), false, true, 'C');
            $pdf->Cell(275, 10, trans_choice('menu.class', 2), false, true, 'C');
            $pdf->SetFont('helvetica', '', 10);
            $style = array(
                'position' => '',
                'align' => 'C',
                'stretch' => false,
                'fitwidth' => true,
                'cellfitalign' => '',
                'border' => true,
                'hpadding' => 'auto',
                'vpadding' => 'auto',
                'fgcolor' => array(255, 0, 0),
                'bgcolor' => false, //array(255,255,255),
                'text' => true,
                'font' => 'helvetica',
                'fontsize' => 8,
                'stretchtext' => 4
            );
            $pdf->Cell(90, 0, '');
            $pdf->write1DBarcode(time(), 'C39', '', '', '', 14, 0.4, $style, 'N');
            $pdf->Image($this->app_logo, 275, 10, 20, 20);
            $pdf->Image($this->head_logo, 10, 10, 20, 20);

        });
        PDFDD::AddPage();
        PDFDD::setPageOrientation('L');
        PDFDD::Cell(10, 7, '', true, false, 'C');
        PDFDD::Cell(90, 7, trans_choice('menu.class', 1), true, false, 'C');
        PDFDD::Cell(90, 7, __('property.grade'), true, false, 'C');
        PDFDD::Cell(90, 7, __('date.date'), true, true, 'C');
        $i = 1;
        foreach ($student->classStudent as $class) {
            PDFDD::Cell(10, 7, $i, true, false, 'C');
            PDFDD::Cell(90, 7, $class->classes->name, true, false, 'C');
            PDFDD::Cell(90, 7, $class->classes->grade, true, false, 'C');
            PDFDD::Cell(90, 7, $class->classes->created_at, true, true, 'C');

            $i++;

        }
        PDFDD::Ln(10);
        PDFDD::setHeaderCallback(function ($pdf) {
            $pdf->SetFont('dejavusans', '', 14);
            $pdf->Cell(275, 10, env("APP_NAME"), false, true, 'C');
            $pdf->Cell(275, 10, trans_choice('file.student_history', 2), false, true, 'C');
            $pdf->SetFont('helvetica', '', 10);
            $style = array(
                'position' => '',
                'align' => 'C',
                'stretch' => false,
                'fitwidth' => true,
                'cellfitalign' => '',
                'border' => true,
                'hpadding' => 'auto',
                'vpadding' => 'auto',
                'fgcolor' => array(255, 0, 0),
                'bgcolor' => false, //array(255,255,255),
                'text' => true,
                'font' => 'helvetica',
                'fontsize' => 8,
                'stretchtext' => 4
            );
            $pdf->Cell(90, 0, '');
            $pdf->write1DBarcode(time(), 'C39', '', '', '', 14, 0.4, $style, 'N');
            $pdf->Image($this->app_logo, 275, 10, 20, 20);
            $pdf->Image($this->head_logo, 10, 10, 20, 20);
        });

        PDFDD::AddPage();
        PDFDD::setPageOrientation('L');
        PDFDD::Ln(1);
        PDFDD::Cell(10, 7, '', true, false, 'C');
        PDFDD::Cell(230, 7, __("file.record"), true, false, 'C');
        PDFDD::Cell(45, 7, __('date.date'), true, true, 'C');
        $i = 1;
        foreach ($student->history()->orderBy('id', 'desc')->get() as $history) {
            PDFDD::Cell(10, 7, $i, true, false, 'C');
            PDFDD::Cell(230, 7, $history->description, true, false, 'C');
            PDFDD::Cell(45, 7, $history->created_at, true, true, 'C');
            $i++;

        }

        PDFDD::setFooterCallback(function ($pdf) {

            $pdf->SetFont('dejavusans', '', 8);

            PDFDD::Cell(275, 7, __("file.printed_by", ['name' => auth()->user()->name]), false, true, 'C');

        });

        PDFDD::Output('StudentProfile.pdf', 'D');
    }

    private function convert($number)
    {
        if ($number < 0 || $number > 999999999) {
            throw new Exception("Number is  out of the range");

        }
        $giga = floor($number / 1000000);
        $number -= $giga * 1000000;
        $kilo = floor($number / 1000);
        $number -= $kilo * 1000;
        $hecto = floor($number / 100);
        $number -= $hecto * 100;
        $deca = floor($number / 10);
        $number -= $deca * 10;
        $n = $number % 10;
        $result = "";
        if ($giga) {
            $result .= $this->convert($giga) . " million";
        }
        if ($kilo) {
            $result .= (empty($result) ? "" : " ") . $this->convert($kilo) . " thousand";
        }
        if ($hecto) {
            $result .= (empty($result) ? "" : " ") . $this->convert($hecto) . " hundred";
        }
        $ones = array(
            "", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten",
            "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen");
        $ten = array("", ""
        , "Twenty", "Thirty", "Forty", "Fifty", "sixty", "Seventy", "Eighty", "Ninety");
        if ($deca || $n) {
            if (!empty($result)) {
                $result .= " and ";
            }
            if ($deca < 2) {
                $result .= $ones[$deca * 10 + $n] . " ";
            } else {
                $result .= $ten[$deca];
                if ($n) {
                    $result .= "-" . $ones[$n];

                }

            }
        }
        if (empty($result)) {


            $result = "Zero";

        }
        return $result;


    }

    public function bill($id)
    {
        $bill = Bill::query()->findOrFail($id);
        $this->value = ['bill_id' => $bill->id];
        PDFDD::SetCreator($this->creator);
        PDFDD::SetAuthor($this->autor);
        PDFDD::SetTitle($bill->classroom->college->department->name);
        PDFDD::SetSubject('');
        PDFDD::SetKeywords('Sulaiman,Kabul University,0765993446');

// set margins
        PDFDD::SetMargins(5, 45, 5);
        PDFDD::SetHeaderMargin(5);
        PDFDD::SetFooterMargin(5);

// set auto page breaks
        PDFDD::SetAutoPageBreak(TRUE, 10);
        PDFDD::setHeaderCallback(function ($pdf) {
            $pdf->SetFont('dejavusans', '', 14);
            $pdf->Cell(148, 10, env('APP_NAME'), false, true, 'C');
            $pdf->Cell(148, 10, trans("PAYMENT"), false, true, 'C');
            $pdf->SetFont('helvetica', '', 10);
            $style = array(
                'position' => '',
                'align' => 'C',
                'stretch' => false,
                'fitwidth' => true,
                'cellfitalign' => '',
                'border' => false,
                'hpadding' => 'auto',
                'vpadding' => 'auto',
                'fgcolor' => array(0, 0, 0),
                'bgcolor' => false, //array(255,255,255),
                'text' => false,
                'font' => 'helvetica',
                'fontsize' => 8,
                'stretchtext' => 4
            );
            $pdf->Cell(35, 0, '');
            $pdf->write1DBarcode("Bill-" . $this->value['bill_id'], 'C39', '', '', '', 14, 0.5, $style, 'N');
            $pdf->Image($this->app_logo, 125, 10, 20, 20);
            $pdf->Image($this->head_logo, 10, 10, 20, 20);

        });
        PDFDD::AddPage("P", "A5");

        $student = $bill->student;
        PDFDD::Image($this->app_logo, 65, 110, 20, 20, '', '', '', false, 300, '', false, false, 0);

        PDFDD::Cell(60, 7, trans("NAME"), true, false, 'L');
        PDFDD::Cell(70, 7, $student->firstname, true, true, 'C');
        PDFDD::Cell(60, 7, trans("LAST NAME"), true, false, 'L');
        PDFDD::Cell(70, 7, $student->lastname, true, true, 'C');
        PDFDD::Cell(60, 7, trans("FATHER NAME"), true, false, 'L');
        PDFDD::Cell(70, 7, $student->fathername, true, true, 'C');
        PDFDD::Cell(60, 7, trans("GRAND FATHER NAME"), true, false, 'L');
        PDFDD::Cell(70, 7, $student->grandfathername, true, true, 'C');
//
        PDFDD::Cell(60, 7, trans("DATE OF BIRTH"), true, false, 'L');
        PDFDD::Cell(70, 7, $student->dateofbirth, true, true, 'C');
        PDFDD::Cell(60, 7, trans("SEX"), true, false, 'C');
        if ($student->sex == 'F') {
            $sex = trans('FEMALE');
        } else {
            $sex = trans('MALE');
        }
        PDFDD::Cell(70, 7, $sex, true, true, 'C');/*
        $age = Date::make($student->dateofbirth)->age;

        PDFDD::Cell(20, 7, trans("AGE"), true, false, 'C');
        PDFDD::Cell(65, 7, $age, true, true, 'C');*/
        PDFDD::Cell(50, 7, trans("PHONE"), true, false, 'C');
        PDFDD::Cell(85, 7, $student->phone, true, true, 'C');
        PDFDD::Cell(50, 7, trans("DEPARTMENT"), true, false, 'C');
        PDFDD::Cell(85, 7, $bill->classroom->college->department->name, true, true, 'C');
        PDFDD::Cell(50, 7, trans("COLLAGE"), true, false, 'C');
        PDFDD::Cell(85, 7, $bill->classroom->college->name, true, true, 'C');

        PDFDD::Cell(50, 7, trans("CLASS"), true, false, 'C');
        PDFDD::Cell(85, 7, $bill->classroom->name, true, true, 'C');
        PDFDD::Cell(50, 7, trans("GRADE"), true, false, 'C');
        PDFDD::Cell(85, 7, $bill->classroom->grade, true, true, 'C');

        PDFDD::Cell(50, 7, trans("FEE"), true, false, 'C');
        PDFDD::Cell(85, 7, $bill->fee, true, true, 'C');
        PDFDD::Cell(50, 7, trans("PAID"), true, false, 'C');
        PDFDD::Cell(85, 7, $bill->paid, true, true, 'C');
        PDFDD::Cell(50, 7, trans("AMOUNT"), true, false, 'C');
        PDFDD::Cell(85, 7, $this->convert($bill->paid), true, true, 'C');
        PDFDD::Cell(50, 7, trans("REMAIN"), true, false, 'C');
        PDFDD::Cell(85, 7, $bill->remain, true, true, 'C');
        PDFDD::Cell(50, 7, trans("DATE"), true, false, 'C');
        PDFDD::Cell(85, 7, $bill->created_at, true, true, 'C');
        PDFDD::Ln(10);
        PDFDD::Cell(85, 30, trans("SIGNATURE"), true, true, 'C');

        PDFDD::Output(uniqid('Bill_') . '.pdf', 'I');

    }


}
