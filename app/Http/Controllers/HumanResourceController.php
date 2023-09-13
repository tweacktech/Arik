<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HumanResourceController extends Controller
{
    function joblistings()
    {
    }

    function addlistings()
    {
        return view('human_resource.joblisting');
    }
}
