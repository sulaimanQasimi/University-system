<?php

namespace App\Http\Controllers;

use App\Models\ClassExam;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
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
        return view('examQuestion.create',compact('exam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ClassExam $exam)
    {
            $question= ExamQuestion::updateOrCreate([
                'exam_id' => $exam->id,],[
                'question' => $request->question,
            ]);
        return redirect()->route('teacher.show',$exam->teacher->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(ExamQuestion $examQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamQuestion $examQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamQuestion $examQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamQuestion  $examQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamQuestion $examQuestion)
    {
        //
    }
}
