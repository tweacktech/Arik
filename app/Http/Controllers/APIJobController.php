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
}
