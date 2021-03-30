<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class EnrollNow extends Controller
{
    public function enroll(Request $request){
        $cid = $request->id;
        $course = DB::table('courses')->where('id', $cid)->get();
        $finalprice = $course[0]->price - ($course[0]->price * $course[0]->discount)/100;
        return view('payment',['course'=>$course,'finalprice'=>$finalprice]);
    }
}
