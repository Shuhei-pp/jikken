<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExperimentController extends Controller
{
    public function toTestPage ($uid,$pid)
    {
        $eid = DB::table('experiments')->insertGetID([
            'exp_kind' => 1,
            'u_id' => $uid
        ]);

        $x1 = 27;
        $x2 = 6;

        return view('experiment.problem',compact('x1','x2','uid','pid','eid') );
    }

    public function postTestResult(Request $request,$uid,$pid){
        
        $request->validate([
            'answer' => 'required|integer',
        ]);

        DB::table('results')->insert([
            'exp_id' => $request->get('eid'),
            'problem_id' => $pid-1,
            'time' => $request->get('time'),
            'answer' => $request->get('answer'),
            'c_w' => $request->get('correct')
        ]);

        $eid = $request->get('eid');

        switch($pid){
            case 2:
                $x1 = 89;
                $x2 = 6;
                break;
            case 3:
                $x1 = 49;
                $x2 = 7;
                break;
            case 4:
                $x1 = 23;
                $x2 = 4;
                break;
            case 5:
                $x1 = 17;
                $x2 = 7;
                break;
            case 6:
                $x1 = 72;
                $x2 = 8;
                break;
            case 7:
                $x1 = 53;
                $x2 = 4;
                break;
            case 8:
                $x1 = 57;
                $x2 = 5;
                break;
            case 9:
                $x1 = 35;
                $x2 = 9;
                break;
            case 10:
                $x1 = 59;
                $x2 = 2;
                break;
            case 11:
                $x1 = 80;
                $x2 = 9;
                break;
            case 12:
                $x1 = 87;
                $x2 = 3;
                break;
            case 13:
                $x1 = 39;
                $x2 = 6;
                break;
            case 14:
                $x1 = 45;
                $x2 = 8;
                break;
            case 15:
                $x1 = 74;
                $x2 = 2;
                break;
            case 16:
                $x1 = 38;
                $x2 = 3;
                break;
            case 17:
                $x1 = 91;
                $x2 = 5;
                break;
            case 18:
                $x1 = 58;
                $x2 = 3;
                break;
            case 19:
                $x1 = 62;
                $x2 = 4;
                break;
            case 20:
                $x1 = 68;
                $x2 = 4;
                break;
            case 21:
                $x1 = 94;
                $x2 = 5;
                break;
            case 22:
                $x1 = 95;
                $x2 = 6;
                break;
            case 23:
                $x1 = 34;
                $x2 = 7;
                break;
            case 24:
                $x1 = 92;
                $x2 = 3;
                break;
            case 25:
                $x1 = 14;
                $x2 = 6;
                break;
            case 26:
                $x1 = 76;
                $x2 = 5;
                break;
            case 27:
                $x1 = 28;
                $x2 = 4;
                break;
            case 28:
                $x1 = 48;
                $x2 = 4;
                break;
            case 29:
                $x1 = 19;
                $x2 = 9;
                break;
            case 30:
                $x1 = 96;
                $x2 = 8;
                break;
        }
        return view('experiment.problem',compact('x1','x2','uid','pid','eid') );
    }

    public function endTest(Request $request,$uid){
        DB::table('results')->insert([
            'exp_id' => $request->get('eid'),
            'problem_id' => 30,
            'time' => $request->get('time'),
            'answer' => $request->get('answer'),
            'c_w' => $request->get('correct')
        ]);

        return view('experiment.end');
    }
}
