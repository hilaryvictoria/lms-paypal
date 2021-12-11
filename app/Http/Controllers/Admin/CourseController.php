<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Course\Course;
use Illuminate\Support\Str;
use App\Helpers\CurrencyHelper;
use App\Models\UserCourse\UserCourse;
use DB;

class CourseController extends Controller
{
    public function index() {
        $meta_title = "Courses";
        $courses = Course::orderBy('id', 'DESC')->paginate(5);
        $currency = CurrencyHelper::getCurrencyString();
        return view('admin.courses.index', compact('meta_title', 'courses', 'currency'));
    }

    public function create() {
        $meta_title = "Create New Courses";
        return view('admin.courses.create', compact('meta_title'));
    }


    public function store(Request $request)
    // The store route is a post route so the method has a request object
    // This function validates the data inserted into the admin/courses/create page, then if validation is successful pushes the data into the courses table.
    // Only after this it checks if the request contains an image too and generates a unique file name with the course id and the original image name, move the image into the public/assets/image folder and save
    // The reason for saving twice is because this is the safest method to have the course_id to concatenate to the image name
    {
        // Validator class provides validation for the post request fields
        $validator = Validator::make($request->all(), 
        [
            // course_title is required, must be a string, max 1000 characters and has to be unique on the courses table field "title"
            'course_title' => ['required', 'string', 'max:1000', 'unique:courses,title'],
            // short_description is not required, must be a string maximum 10000 characters
            'short_description' => ['nullable', 'string', 'max:10000'],
            // intro is not required, must be a string maximum 10000 characters
            'intro' => ['nullable', 'string', 'max:10000'],
            // video is not required, must be a string maximum 255 characters
            'video' => ['nullable', 'string', 'max:255'],
            // warning is not required, must be a string maximum 10000 characters
            'warning' => ['nullable', 'string', 'max:10000'],
            // cover_image is not required, must be a image, accepted formats are jpeg, jpg, png and webp, not bigger than 1999 kb (< 2 Mb)
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:1999'],
            // course_price is required, a numeric field and can not be lower than 1
            'course_price' => ['required', 'numeric', 'min:1'],
        ]);

        // we call the fails method on the validator, if it returns true it means validation may have failed at some point
        if( $validator->fails() )
        {
            // redirect back to the page with the error message of the validator, leaving the input fields populated as they were
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // if not failing validation I instantiate a new Course object
        $course = new Course;
        // we set a course title
        $course->title = $request->course_title;
        // we set a course slug from the course title
        $course->slug = Str::slug($request->course_title);
        // we set a course intro that will be visible only after buying the course
        $course->intro = $request->intro;
        // we set a course video that will be visible only after buying the course
        $course->video = $request->video;
         // we set a course warning that will be visible only after buying the course
         $course->warning = $request->warning;
        // we set a course description
        $course->description = $request->short_description;
        // we set a course price
        $course->price = $request->course_price;
        // we
        $course->save();

        // if there is a file in the request
        if( $request->hasFile('cover_image')  )
        {
            $file = $request->file('cover_image');
            // we save the extension of the file
            $extension = $file->getClientOriginalExtension();
            // we save the original file name (pathinfo() is a php function)
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            // we create the filename: original_2.ext for avoiding conflict between files
            $fileNameToStore = $originalFileName . '_' . $course->id . '.' . $extension;
            // we set the destination path. Public_path is a Laravel helper, it will return the url of the public folder
            $destinationPath = public_path() . "/uploads/images";
            // we call the move method, the first parameter is the destination path and the second one is the name of the file. $uploadIsSuccessful is a flag and returns true when upload was successful
            $uploadIsSuccessful = $file->move($destinationPath, $fileNameToStore);
            // if the upload is successful we save the image path to the image column of the course table
            if($uploadIsSuccessful) { $course->image = $fileNameToStore; }
            // we save the course again.
            $course->save();
        }
        // we get redirected to the admin courses route with a message of successful course creation
        return redirect()->route('admin.courses')->with('successMsg', 'The Course has been successfully created!');
    }

    public function edit($courseId)
    // Fetches the course data from the database searching with the courseId, if it does not exist returns a 403 error page
    // If the course id exist returns the view admin.courses.edit passing the meta_title and the course variables to it
    {
        $course = DB::table('courses')->find($courseId);
        if(is_null($course))
        {
            abort(403, 'The course has not been found!');
        }
        $meta_title = "Edit a Course";
        return view('admin.courses.edit', compact('meta_title', 'course'));
    }

    public function update(Request $request, $courseId)
    {
        // Update function look for the course id and if not found the method findorfail will return an error message. the request, validate the data like into the store method, and redirect and return an error if validation fails.
        // It will update the data into the db and then check if there is an image into the request. It checks if the image name is already present between the asset files and if it so will unlink the old one and insert the new one.
        $course = Course::findOrFail($courseId);
        // Validation is almost the same of the create method, but we are appending the $courseId to the unique criteria of course_title. It means that the name has to be unique, but if the course id is the same of the one that I am trying to update it could not be unique
        $validator = Validator::make($request->all(), [
            'course_title' => ['required', 'string', 'max:1000', 'unique:courses,title,' . $courseId],
            'short_description' => ['nullable', 'string', 'max:10000'],
            'intro' => ['nullable', 'string', 'max:10000'],
            'video' => ['nullable', 'string', 'max:255'],
            'warning' => ['nullable', 'string', 'max:10000'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:1999'],
            'course_price' => ['required', 'numeric', 'min:1'],
        ]);

        if( $validator->fails() )
        {
            // if validation fails we get redirected with errors
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // we insert the data
        $course->title = $request->course_title;
        $course->slug = Str::slug($request->course_title);
        $course->description = $request->short_description;
        $course->intro = $request->intro;
        $course->video = $request->video;
        $course->warning = $request->warning;
        $course->price = $request->course_price;

        // same code of store method
        if( $request->hasFile('cover_image')  )
        {
            $file = $request->file('cover_image');
            $extension = $file->getClientOriginalExtension();
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            $fileNameToStore = $originalFileName . '_' . $course->id . '.' . $extension;
            $destinationPath = public_path() . "/uploads/images";

            // added part to the store method. If the file exists in the destination path
            $fileExists = file_exists($destinationPath . '/' . $course->image);
            // if the resource is a file
            $isFile = is_file($destinationPath . '/' . $course->image);
            if ( $fileExists && $isFile )
            {
                // I unlink the file under the destination
                $fileDeleted = unlink($destinationPath . '/' .$course->image);
            }
            // I store the new file
            $uploadIsSuccessful = $file->move($destinationPath, $fileNameToStore);
            if($uploadIsSuccessful) { $course->image = $fileNameToStore; }
        }
        // save the updated file path into the course table
        $course->save();

        // redirecting to admin.courses with a success message
        return redirect()->route('admin.courses')->with('successMsg', 'The Course has been successfully updated!');
    }

    public function destroy(Request $request, $courseId)
    {
        // Destroy function will find a course based on the $courseId that came from the route if the course I am trying to delete exist, delete all the rows into the user_courses table where which contain the course_id and then will delete the course and redirect with a success message
        $course = Course::find($courseId);
        // if it does not find the course
        if(is_null($course))
        {
            // will redirect back with a faliure message
            return redirect()->route('admin.courses')->with('failureMsg', 'The Course with the following id could NOT be deleted: ' . $courseId);
        }
        // we get the rows from the user_course table where the course_id corresponds to the one I want to delete
        $userCourses = UserCourse::where('course_id', $course->id)->get();
        // looping and deleting each row
        foreach($userCourses as $item)
        {
            $item->delete();
        }
        // after deleting all the course associations I delete the course itself
        $course->delete();

        return redirect()->route('admin.courses')->with('successMsg', 'The Course with the following id has been successfully deleted: ' . $courseId);
    }
}
