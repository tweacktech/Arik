<?php

namespace App\Http\Controllers;

use App\Models\Baggage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class BaggageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function addBaggage(Request $request)
    {
        $validator = Validator::make($req->all(), [
            'kg' => 'required',
            'price' => 'required',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
   
        $Baggage = new Baggage();
        $Baggage->kg = $req->input('kg');
        $Baggage->price = $req->input('price');
        $Baggage->save();
        if ($Baggage) {    
        return redirect()->back()->with('success', 'successfully added');
                    }
             return redirect()->back()->with('error', 'Could not perform this action');
}

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Baggage  $baggage
     * @return \Illuminate\Http\Response
     */
    public function updateBaggage(Request $req, $id)
    {

        //  $validator = Validator::make($req->all(), [
        //     'kg' => 'required',
        //     'price' => 'required',
            
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
   
        $Baggage =  Baggage::find($id);
        $Baggage->kg = $req->input('kg');
        $Baggage->price = $req->input('price');
        $Baggage->save();
        if ($Baggage) {    
        return redirect()->back()->with('success', 'successfully added');
                    }
             return redirect()->back()->with('error', 'Could not perform this action');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Baggage  $baggage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Baggage $baggage)
    {
        //
    }
}
