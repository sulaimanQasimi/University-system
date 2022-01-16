<?php

namespace App\Http\Controllers;

use App\Models\ClassExam;
use App\Models\ExamResult;
use App\Models\ExamStudent;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ClassExam $exam)
    {
        $this->authorize('view',$exam);

        return view('examResult.create',compact('exam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ClassExam $exam)
    {
        $this->authorize('view',$exam);
        $student=$request->student;
        foreach ($student as $s=>$x_value){
          $student=  ExamStudent::find($s);
            foreach ($x_value as $d=>$f){
                if ($d =='classActivity'){
                    $student->classActivity=$f;
                }elseif ($d =='homework'){
                    $student->homework=$f;
                }elseif ($d =='mid'){
                    $student->mid=$f;
                }elseif ($d =='final'){
                    $student->final=$f;
                }
                $student->save();
            }
        }
        return redirect()->route('teacher.show',$exam->teacher->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamResult  $examResult
     * @return \Illuminate\Http\Response
     */
    public function show(ExamResult $examResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamResult  $examResult
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamResult $examResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamResult  $examResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamResult $examResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamResult  $examResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamResult $examResult)
    {
        //
    }
}
