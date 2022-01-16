<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\SubDepartment;
use Illuminate\Http\Request;

class SubDepartmentController extends Controller
{
    public function __construct()
    {
//        $this->authorize(SubDepartment::class,'sub_department');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('subDepartment.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubDepartment  $subDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department,$id){
       $department= $department->subDepartments()->findOrFail($id);
        $this->authorize('view',$department);
        return view('subDepartment.view',compact('department','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubDepartment  $subDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit(SubDepartment $subDepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubDepartment  $subDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubDepartment $subDepartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubDepartment  $subDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubDepartment $subDepartment)
    {
        //
    }
}
