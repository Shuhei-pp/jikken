<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registUserController extends Controller
{
    public function toRegistUserPage ()
    {
        return view('registUser');
    }


    public function registUser(Request $request){
        $request->validate([
            'name' => 'required',
            'grade' => 'required|integer',
        ]);

        $id = DB::table('users')->insertGetID([
            'name' => $request->get('name'),
            'grade' => $request->get('grade')
        ]);
        $name = $request->get('name');
        return view('practice.start',compact("name","id"));
    }
}
