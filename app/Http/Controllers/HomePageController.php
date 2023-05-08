<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomePage;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class HomePageController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


     public function switchStatus($id)
    {
        $status = HomePage::find($id);

        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }

        // Set the status value to 1
        $status->status = 1;
        $status->save();

        // Set the other status values to 0
        HomePage::where('id', '!=', $id)->update(['status' => 0]);

        return redirect()->back();
    }



     public function home_role($id)
    {

        //get user info by id sent 
        $user = DB::table('home_pages')->where(DB::raw('md5(id)'), $id)->first();

        //get user menu
        $user_menu = DB::table('home_roles')
            ->where('role_id', 'home_roles.role_id')
            ->first();

        //get menu
        $menus = DB::table('roles')
            ->get();

        return view('Home_roles', compact('user_menu', 'user', 'menus'));
    }






    public function add_homepage(Request $req, $id)
    {

        //insert menu_id into user_menu by current user_id

        // $add = DB::table('home_roles')
        //     ->insert([
        //         'homepage_id' => $req->user_id, 'role_id' => $id
        //     ]);

            $existing = DB::table('home_roles')
    ->where('homepage_id', $req->user_id)
    ->where('role_id', $id)
    ->first();

if ($existing) {
    // Item exists, remove it
     return redirect()->back()->with('alert', 'Menu existing');
} else {
    // Item doesn't exist, insert it
  $add =  DB::table('home_roles')
        ->insert([
            'homepage_id' => $req->user_id, 'role_id' => $id
        ]);
}


        //check if menu added
        if ($add) {

            DB::table('activities')
                ->insert([
                    'activity' => 'User Menu Was Added by' . Auth::user()->name,
                    'activity_type' => 'Added'
                ]);

            return redirect()->back()->with('alert', 'Menu Added Successfully');
        }
        return redirect()->back()->with('alert', 'Failed To Add Menu');
    }

    public function remove_homepage(Request $req, $id)
    {
        //insert menu_id into user_menu by current user_id

        $remove = DB::table('home_roles')
            ->where('homepage_id', $id)
            ->where('role_id', $req->user_id)
            ->delete();


        //check if menu removed
        if ($remove) {

            DB::table('activities')
                ->insert([
                    'activity' => 'User Menu Removed Successfully  by' . Auth::user()->name,
                    'activity_type' => 'delete'
                ]);

            return redirect()->back()->with('alert', 'Menu Removed Successfully');
        }
        return redirect()->back()->with('alert', 'Failed To Remove Menu');
    }
}
