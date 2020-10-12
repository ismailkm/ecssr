<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => "Student One",
            'email' => 'student@student.com',
            'password' => Hash::make('student'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
