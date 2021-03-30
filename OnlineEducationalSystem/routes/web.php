<?php

use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\UserCourse;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $uid = auth()->user()->id;
        $query = "select * from courses where id in (select course_id from user_courses where user_id = $uid)";
        $usercourses = DB::select(DB::raw($query));
        $query = "SELECT * FROM courses";
        $courses = DB::select(DB::raw($query));
        return view('dashboard',['courses'=>$courses,'usercourses'=>$usercourses]);
})->name('dashboard');

Route::get('/courses','App\Http\Controllers\Courses@courses')->name('courses');

Route::get('/mycourses','App\Http\Controllers\MyCourses@mycourses')->name('mycourses');

Route::get('/enroll','App\Http\Controllers\EnrollNow@enroll')->name('enroll');

Route::post('/payment','App\Http\Controllers\Payment@payment')->name('payment');

Route::post('/paymentconfirmed','App\Http\Controllers\Payment@paymentconfirmed')->name('paymentconfirmed');

Route::get('/showcourse','App\Http\Controllers\Courses@showcourse')->name('showcourse');

Route::get('/downloadpdf','App\Http\Controllers\Courses@downloadpdf')->name('downloadpdf');