<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class Payment extends Controller
{
    public function payment(Request $request){
        $cid = $request->id;
        $paymentmode = $request->paymentmode;
        $course = DB::table('courses')->where('id', $cid)->get();
        $finalprice = $course[0]->price - ($course[0]->price * $course[0]->discount)/100;
        if($paymentmode == "GPay")
        {
            return view('gpaypayment',['course'=>$course,'finalprice'=>$finalprice]);
        }
        else if($paymentmode == "Paytm")
        {
            return view('paytmpayment',['course'=>$course,'finalprice'=>$finalprice]);
        }
        if($paymentmode == "Card")
        {
            return view('cardpayment',['course'=>$course,'finalprice'=>$finalprice]);
        }
    }

    public function paymentconfirmed(Request $request)
    {
        $uid = auth()->user()->id;
        $cid = $request->id;
        $date = now()->toDateString('Y-m-d');
        $created_at = now();
        DB::insert('INSERT INTO user_courses (user_id,course_id,payment_status,dayCreated,created_at,updated_at) Values(?,?,?,?,?,?)',[$uid,$cid,1,$date,$created_at,$created_at]);
        $message = "Your Payment is confirmed! You can now start your Course";
        $cid = $request->id;
        if(isset($request->vid))
        {
            $currentvideos = DB::table('videos')->where('id', $request->vid)->get();
            $videos = DB::table('videos')->where('course_id', $cid)->get();
            $video = $currentvideos[0];
            return view('showcourse',['videos'=>$videos,'video'=>$video,'cid'=>$cid]);
        }
        $videos = DB::table('videos')->where('course_id', $cid)->get();
        $video = $videos[0];
        $coursearray = DB::table('courses')->where('id', $cid)->get();
        $course = $coursearray[0];
        return view('showcourse',['videos'=>$videos,'video'=>$video,'cid'=>$cid,'course'=>$course,'message'=>$message]);
    }
}
