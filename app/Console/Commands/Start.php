<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Start extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Admin User';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        DB::table('roles')->insert([
            'roleName' => 'Admin',
            'roleDescription' => 'Admin can access to All Model'
        ]);
        DB::table('roles')->insert([
            'roleName' => 'Header',
            'roleDescription' => 'Header can access to All Sub Departmenr'
        ]);

        DB::table('roles')->insert([
            'roleName' => 'Sub Header',
            'roleDescription' => 'Sub Header can access to their Department'
        ]);

        DB::table('roles')->insert([
            'roleName' => 'Finance',
            'roleDescription' => 'Finance can access to Finance'
        ]);
        DB::table('roles')->insert([
            'roleName' => 'Exam Controller',
            'roleDescription' => 'Exam Controller can access to Exam Section'
        ]);
        DB::table('roles')->insert([
            'roleName' => 'Teacher',
            'roleDescription' => 'Teacher can access to their classes'
        ]);
        DB::table('roles')->insert([
            'roleName' => 'Student',
            'roleDescription' => 'Student can access to Student Section'
        ]);
        DB::table('roles')->insert([
            'roleName' => 'Recipients',
            'roleDescription' => 'Create Student See Any thing else'
        ]);
        User::create([
            'role_id' => 1,
            'name' => 'ALi',
            'email' => 'farzadqasimy@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('S11solai'),
        ]);

    }
}
