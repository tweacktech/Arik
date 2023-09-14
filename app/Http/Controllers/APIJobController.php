<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIJobController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
    }

    public function joblist()
    {
    }

    public function jobdetails($id)
    {
    }

    public function jobschedules($id)
    {
    }

    public function myapplications($id)
    {
    }

    public addtosavedjobs(Request $request){

    }
}
