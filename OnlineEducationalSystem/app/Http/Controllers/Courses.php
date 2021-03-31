<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCourse;
use App\Models\Video;
use Illuminate\Support\Facades\DB;

class Courses extends Controller
{
    public function courses()
    {
        $uid = auth()->user()->id;
        $query = "select * from courses where id in (select course_id from user_courses where user_id = $uid)";
        $usercourses = DB::select(DB::raw($query));
        $query = "SELECT * FROM courses";
        $courses = DB::select(DB::raw($query));
        return view('courses',['courses'=>$courses,'usercourses'=>$usercourses]);
    }

    public function showcourse(Request $request)
    {
        $cid = $request->id;
        if(isset($request->vid))
        {
            $currentvideos = DB::table('videos')->where('id', $request->vid)->get();
            $videos = DB::table('videos')->where('course_id', $cid)->get();
            $video = $currentvideos[0];
            $coursearray = DB::table('courses')->where('id', $cid)->get();
            $course = $coursearray[0];
            return view('showcourse',['videos'=>$videos,'video'=>$video,'cid'=>$cid,'course'=>$course]);
        }
        $videos = DB::table('videos')->where('course_id', $cid)->get();
        $video = $videos[0];
        $coursearray = DB::table('courses')->where('id', $cid)->get();
        $course = $coursearray[0];
        return view('showcourse',['videos'=>$videos,'video'=>$video,'cid'=>$cid,'course'=>$course]);
    }

    public function downloadpdf(Request $request){
        $file = $request->file;
        $headers = array(
            'Content-Type: application/octet-stream',
        );
        return response()->download("../resources/logs/$file", $file, $headers);
    }
}