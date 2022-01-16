<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;
class StudentsImport implements ToCollection,WithHeadingRow,SkipsOnError,WithChunkReading
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $user = User::firstOrCreate([
                'email' =>$row['kankor_id'].'@student.kabul.edu.af',],
            [
                'role_id' => 7,
                'name' => $row['name'],
                'profile_photo_path' => '',
                'password' => Hash::make('password')]);


            $student=Student::firstOrCreate([
                'kankor_id'=>$row['kankor_id'],
                ],
                [
                    'department_id'=>$row['department_id'],
                    'user_id'=>$user->id,
                    'year'=>$row['year'],
                    'school'=>$row['school'],
                    'firstname'=>$row['name'],
                    'lastname'=>$row['lastname'],
                    'fathername'=>$row['fathername'],
                    'grandfathername'=>$row['grandfathername'],
                    'grade'=>$row['grade'],
                    'dateofbirth'=>$row['dateofbirth'],
                    'sex'=>$row['sex'],
                    'phone'=>$row['phone'],
                    'address'=>$row['address']]);

            StudentProfile::create([
                    'student_id'=>$student->id,'description'=>'در سیستم افزوده شد',
                ]);
            StudentProfile::create([
                    'student_id'=>$student->id,'description'=>$user->email.'برای محصل ایمیل ایجاد شد.',
                ]);

        }
        // TODO: Implement collection() method.
    }

    public function onError(Throwable $e)
    {
        // TODO: Implement onError() method.
    }
    public function chunkSize(): int
    {
        return 100;
    }
}
