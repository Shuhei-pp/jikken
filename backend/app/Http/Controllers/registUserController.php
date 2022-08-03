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
        // if(0<($request->get("grade")) || $request->get("grade")<100 ){
        //     $error = "学年は半角数字で入力してください";
        //     return view('registUser',compact("error"));
        // }

        $id = DB::table('users')->insertGetID([
            'name' => $request->get('name'),
            'grade' => $request->get('grade')
        ]);
        $name = $request->get('name');
        return view('practice.start',compact("name","id"));
    }
}
