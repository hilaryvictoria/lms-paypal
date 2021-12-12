<?php

namespace App\Http\Controllers;

use App\Helpers\CurrencyHelper;
use Auth;
use DB;
use App\Models\Course\Course;

class FrontendCourseController extends Controller
{
    // index function gets all the courses and orders them by id in ascending order, paginates them by 5 and returns the view courses with the courses variable
    public function index()
    {
        $courses = Course::orderBy('id', 'ASC',)->paginate(5);
        return view('courses', compact('courses'));
    }

    // show function checks if the authenticated user id is matching with the user_id of a user who bought the course, searching for the user_id and course_id in the table user_courses
    // If no matches are found the flag $userBoughtCourse is set to false and in the frontend buy buttons are shown for the user to buy the course
    // If there is a row that matches user_id and course_id the $userBoughtCourse flag is set to false You have access to this course! is shown in place of the buttons
    public function show($courseId)
    {
        // getting the authenticated user
        $authUser = Auth::user();
        // Getting the course based on the courseId
        $course = DB::table('courses')->where('id', $courseId)->first();
        $categories = DB::table('categories')->where('course_id', $courseId)->get();
        $lessons = DB::table('lessons')->where('course_id', $courseId)->get();

        // if there is no course with the specified id
        if (is_null($course)) {
            // returns a error view that says that the course has not been found
            abort(403, 'Impossibile trovare il corso!');
        }

        // this is a flag
        $userBoughtCourse = false;
        // if the authenticated user is not null (so the user is logged in)
        if (!is_null($authUser)) {
            // We check for the authenticated user id. When user_id has access to a course with a specific course_id then it should have a row in the table user_courses
            $userCourse = DB::table('user_courses')->where('user_id', $authUser->id)->where('course_id', $course->id)->first();
            // the user_id and the course_id have a row in the user_courses table
            if (!is_null($userCourse)) {
                // we set the flag to true
                $userBoughtCourse = true;
            }
        }

        $currency = CurrencyHelper::getCurrencyString();
        // we return the view and all the variables that will be used in the view with the native php function compact()
        return view('course', compact('course', 'userBoughtCourse', 'currency', 'categories', 'lessons'));
    }

    public function showLesson($lessonId)
    {
        // getting the authenticated user
        $authUser = Auth::user();

        
        $lesson = DB::table('lessons')->where('id', $lessonId)->first();
        // Getting the course based on the courseId
        $course = DB::table('courses')->where('id', $lesson->course_id)->first();
        $category = DB::table('categories')->where('id', $lesson->category_id)->first();
        // if there is no course with the specified id
        if (is_null($lesson)) {
            // returns a error view that says that the course has not been found
            abort(403, 'Impossibile trovare la lezione!');
        }

        // this is a flag
        $userBoughtCourse = false;
        // if the authenticated user is not null (so the user is logged in)
        if (!is_null($authUser)) {
            // We check for the authenticated user id. When user_id has access to a course with a specific course_id then it should have a row in the table user_courses
            $userCourse = DB::table('user_courses')->where('user_id', $authUser->id)->where('course_id', $course->id)->first();
            // the user_id and the course_id have a row in the user_courses table
            if (!is_null($userCourse)) {
                // we set the flag to true
                $userBoughtCourse = true;
            }else{
                abort(403, 'Non hai accesso a questa lezione, per vederla acquista il corso '.$course->title);
            }
        }


        // get file ext
        $ext = pathinfo($lesson->file, PATHINFO_EXTENSION);

        // $currency = CurrencyHelper::getCurrencyString();
        // we return the view and all the variables that will be used in the view with the native php function compact()
        return view('course-lesson', compact('course', 'userBoughtCourse', 'category', 'lesson', 'ext'));
    }
}
