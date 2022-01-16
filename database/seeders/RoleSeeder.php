<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'roleName'=>'Admin',
            'roleDescription'=>'Admin can access to All Model'
        ]);
        DB::table('roles')->insert([
            'roleName'=>'Header',
            'roleDescription'=>'Header can access to All Sub Departmenr'
        ]);

        DB::table('roles')->insert([
            'roleName'=>'Sub Header',
            'roleDescription'=>'Sub Header can access to their Department'
        ]);

        DB::table('roles')->insert([
            'roleName'=>'Finance',
            'roleDescription'=>'Finance can access to Finance'
        ]);
        DB::table('roles')->insert([
            'roleName'=>'Exam Controller',
            'roleDescription'=>'Exam Controller can access to Exam Section'
        ]);
        DB::table('roles')->insert([
            'roleName'=>'Teacher',
            'roleDescription'=>'Teacher can access to their classes'
        ]);
        DB::table('roles')->insert([
            'roleName'=>'Student',
            'roleDescription'=>'Student can access to Student Section'
        ]);
    }
}
