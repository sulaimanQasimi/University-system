<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
 |-----------------------------------------------------------------------------------------|
 |-----------------------------------------------------------------------------------------|
 |------------------------- File Download Route -------------------------------------------|
 |-----------------------------------------------------------------------------------------|
 |-----------------------------------------------------------------------------------------|
 |
 * */

Route::get('/', function () {
return redirect()->route('login')->expire();
});
Route::view('sulaiman', 'sulaiman');
Route::group([
    'middleware'=>'auth:sanctum', 'verified',

    'prefix'=>'file'

], function () {

    Route::group([

        'prefix'=>'exam/pdf'

    ], function () {
        Route::get('list/{id}', [\App\Http\Controllers\file\pdf\DownloadController::class, 'exam_list'])->name('file.exam.pdf.list');
        Route::get('paper/{id}', [\App\Http\Controllers\file\pdf\DownloadController::class, 'exam_paper'])->name('file.exam.pdf.paper');
        Route::get('list/empty/{id}', [\App\Http\Controllers\file\pdf\DownloadController::class, 'exam_list_empty'])->name('file.exam.pdf.list.empty');
    });

    Route::group([
        'prefix'=>'class/pdf'

    ], function () {
        Route::get('attendance/{id}', [\App\Http\Controllers\file\pdf\DownloadController::class, 'class_attendence'])->name('file.class.pdf.attendence');
        Route::get('list/{id}', [\App\Http\Controllers\file\pdf\DownloadController::class, 'class_list'])->name('file.class.pdf.list');
        Route::get('schedule/{id}', [\App\Http\Controllers\file\pdf\DownloadController::class, 'class_schedule'])->name('file.class.pdf.schedule');
    });

    Route::group([

        'prefix'=>'student/pdf'

    ], function () {
        Route::get('profile/{id}', [\App\Http\Controllers\file\pdf\DownloadController::class, 'student_profile'])->name('file.student.profile')->block();
        Route::get('history/{id}', [\App\Http\Controllers\file\pdf\DownloadController::class, 'student_history'])->name('file.student.history')->block();
        Route::get('imports', [\App\Http\Controllers\file\student\ImportController::class, 'index'])->name('file.student.imports')->middleware('can:viewAny,App\Model\Subject');
        Route::post('import', [\App\Http\Controllers\file\student\ImportController::class, 'upload'])->name('file.student.import')->middleware('can:viewAny,App\Model\Subject');
    });

    Route::get('sub_department/list', [\App\Http\Controllers\file\pdf\DownloadController::class, 'subdepartmentList'])->name('file.subdepartment.list');
    Route::get('bill/{id}', [\App\Http\Controllers\file\pdf\DownloadController::class, 'bill'])->name('file.bill');
    Route::get('download',/*'download.file'*/
        function () {
            return abort(404, "Page Is Not Used");
        })->name('download');
});
//Route::middleware(['auth:sanctum', 'verified'])->get('event', function () {
//    event(new \App\Events\CreateClass(\App\Models\Student::find(10)));
//});
Route::group([
'middleware'=>'auth:sanctum', 'verified',
], function () {
    Route::resource('department', \App\Http\Controllers\DepartmentController::class)->names(['index' => 'department']);

    Route::resource('department.subdepartment', \App\Http\Controllers\SubDepartmentController::class);
    Route::resource('exam.result', \App\Http\Controllers\ExamResultController::class)->only(['create', 'store'])->names(['create' => 'exam.result.create','store' => 'exam.result.store',]);
    Route::get('teacher',\App\Http\Livewire\Table\Teacher::class)->name('teacher.index');
    Route::resource('teacher', \App\Http\Controllers\TeacherController::class)->only(['create','show','edit','destroy'])->where(['id'=>'[0-9]+']);
    Route::resource('user', \App\Http\Controllers\UserController::class)->middleware(['auth:sanctum', 'verified'])->names(['index' => 'user.index','show' => 'user.show']);
    Route::resource('class.student', \App\Http\Controllers\ClassStudentController::class);
    Route::resource('exam.question', \App\Http\Controllers\ExamQuestionController::class)->names(['create' => 'exam.question.create','store' => 'exam.question.store']);
    Route::get('subject', [\App\Http\Controllers\SubjectController::class,'index'])->name('subject')->middleware('can:viewAny,App\Model\Subject');
    Route::get('bill', [\App\Http\Controllers\BillController::class, 'index'])->name('bill')->middleware('can:viewAny,App\Model\Bill');
    Route::resource('student', \App\Http\Controllers\StudentController::class);
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'main'])->name('dashboard');

    Route::group(['prefix'=>'file/print',],function (){
        Route::get('bill/{id}/single',[\App\Http\Controllers\PrintController::class,'single_bill'])->name('print.bill.single');
        Route::get('class/bill/{id}/all',[\App\Http\Controllers\PrintController::class,'all_bill'])->name('print.bill.all');
    });

});




