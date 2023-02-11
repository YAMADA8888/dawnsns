<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function index(Request $request){
        $search = $request->input('search');

        if($search){
            $users = DB::table('users')
                ->where('username', 'like', "%$search%")
                ->get();
        }else{
            $users = DB::table('users')->get();
        }
        return view('users.search', compact('users'));
    }

}
