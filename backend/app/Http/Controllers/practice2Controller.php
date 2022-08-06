<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class practice2Controller extends Controller
{
    public function toTestPage ($uid,$pid)
    {
        $x1 = 83;
        $x2 = 3;

        return view('practice2.problem',compact('x1','x2','uid','pid') );
    }

    public function postPractice(Request $request,$uid,$pid){

        $request->validate([
            'answer' => 'required|integer',
        ]);

        $eid = $request->get('eid');

        switch($pid){
            case 2:
                $x1 = 23;
                $x2 = 6;
                break;
            case 3:
                $x1 = 42;
                $x2 = 9;
                break;
        }
        return view('practice2.problem',compact('x1','x2','uid','pid') );
    }

    public function endPractice(Request $request,$uid){
        $user=DB::table('users')->where('id',$uid);
        $name = $user->value("name");


        $id = $uid;
        return view('experiment2.start',compact("name","id"));
    }
}
