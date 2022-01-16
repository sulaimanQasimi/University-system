<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\Student;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class ClassStudentController extends Controller
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
    public function create(Classes $class)
    {
        $department = $class->department->students()->doesntHave('classStudent')->get();
        $removed = $class->department->students()->has('removed')->get();
//        dd($removed);
        return view('classStudent.create', compact('class', 'department', 'removed'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Classes $class)
    {
        $request->validate(
            [
                'student.*' => ['exists:students,id', 'numeric'],
            ]);
        foreach ($request->student as $student) {
            if (Student::find($student) != null) {
                $up = Student::find($student);
                $up->grade = $class->grade;
                $up->save();
                $class->classStudents()->updateOrCreate([
                    'class_id' => $class->id,
                    'student_id' => $student,
                ], ['deleted_at' => null]);
                StudentProfile::create([
                    'student_id' => $up->id,
                    'description' => __("'student.add_to_system", ['name' => $up->firstname, 'id' => $up->id]),
                ]);
            }
        }
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassStudent $classStudent
     * @return \Illuminate\Http\Response
     */
    public function show(ClassStudent $classStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassStudent $classStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassStudent $classStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\ClassStudent $classStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassStudent $classStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassStudent $classStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassStudent $classStudent)
    {
        //
    }
}
