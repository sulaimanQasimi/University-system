<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function studentView()
    {
        return view('import.student');
    }

    public function studentUpload(Request $request)
    {
        $file= $request->file('file')->store('Import/student');
        if($file!=null){
            (new StudentsImport)->import($file);
        }



        return back();
    }
}
