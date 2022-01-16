<?php

namespace App\Http\Controllers\file\student;

use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function index()
    {
        set_time_limit('3000');
        return view('import.student');
    }

    public function upload(Request $request)
    {
        set_time_limit('3000');
        $file= $request->file('file')->store('Import/student');
        if($file!=null){
            (new StudentsImport)->import($file);
        }



        return back();
    }

}
