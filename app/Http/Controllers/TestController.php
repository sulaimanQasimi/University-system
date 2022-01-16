<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Exam\PDF\PList;
use App\Imports\ContactsImport;
use App\Imports\StudentsImport;
use App\Models\ClassExam;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDFDD;

//use PList;
class TestController extends Controller

{
            public function store(Request $request)
            {
            $file= $request->file('excel');

            (new StudentsImport)->import($file);


        }

            public function pdf(){

    }
}
