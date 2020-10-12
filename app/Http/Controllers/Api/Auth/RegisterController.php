<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Http\Requests\Api\StudentRegistrationRequest;
use App\Models\Student;

class RegisterController extends Controller
{
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Student
     */
    public function register(StudentRegistrationRequest $request)
    {
        $student =  Student::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
         event(new Registered($student));
        return response()->success("Account has been successfully created.", 200, $student);
    }

}
