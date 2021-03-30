<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCourse;
use Illuminate\Support\Facades\DB;

class MyCourses extends Controller
{
    public function mycourses()
    {
        $uid = auth()->user()->id;
        $query = "select * from courses where id in (select course_id from user_courses where user_id = $uid)";
        $mycourses = DB::select(DB::raw($query));
        return view('mycourses',['mycourses'=>$mycourses]);
    }
}