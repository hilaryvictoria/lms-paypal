<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\Lesson;
use App\Models\Course\Course;
use App\Models\Course\Category;
use Illuminate\Support\Facades\Validator;
use DB;

class LessonController extends Controller
{
    //
    public function index()
    {
        $meta_title = "Lessons";
        $lessons = Lesson::orderBy('id', 'DESC')->paginate(5);
        return view('admin.lessons.index', compact('meta_title', 'lessons'));
    }

    // create a new lesson
    public function create()
    {
        $meta_title = "Create New Lessons";
        $courses = Course::orderBy('id', 'ASC')->get();
        $categories = Category::orderBy('id', 'ASC')->get();
        return view('admin.lessons.create', compact('meta_title', 'courses', 'categories'));
    }

    // get categories from one course
    public function getCategory($courseId)
    {
        $cat = Category::where('course_id', $courseId)->orderBy('id', 'ASC')->get();
        return json_encode($cat);
    }

    // store a new category
    public function store(Request $request)
    // The store route is a post route so the method has a request object
    // This function validates the data inserted into the admin/courses/create page, then if validation is successful pushes the data into the courses table.
    // Only after this it checks if the request contains an image too and generates a unique file name with the course id and the original image name, move the image into the public/assets/image folder and save
    // The reason for saving twice is because this is the safest method to have the course_id to concatenate to the image name
    {
        // Validator class provides validation for the post request fields
        $validator = Validator::make(
            $request->all(),
            [
                // course_title is required, must be a string, max 1000 characters and has to be unique on the courses table field "title"
                'title' => ['required', 'string', 'max:1000'],
                // short_description is not required, must be a string maximum 10000 characters
                'description' => ['nullable', 'string', 'max:10000'],
                // course is required, a numeric field and must exist inside the table courses, column id
                'course' => ['required', 'numeric', 'exists:courses,id'],
                // category is required, a numeric field and must exist inside the table categories, column id
                'category' => ['required', 'numeric', 'exists:categories,id'],
                // video
                'video' => ['nullable', 'string', 'max:1000'],
                // file is not required, must be a image, accepted formats are jpeg, jpg, png and webp, not bigger than 1999 kb (< 2 Mb)
                'file' => ['nullable', 'max:1999'],
            ]
        );

        // we call the fails method on the validator, if it returns true it means validation may have failed at some point
        if ($validator->fails()) {
            // redirect back to the page with the error message of the validator, leaving the input fields populated as they were
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // if not failing validation I instantiate a new Lesson object
        $lesson = new Lesson;
        // we set a course title
        $lesson->title = $request->title;
        // we set a lesson description
        $lesson->description = $request->description;
        // we set a lesson price
        $lesson->course_id = $request->course;
        // we set a lesson price
        $lesson->category_id = $request->category;
        // we set a lesson video
        $lesson->video = $request->video;
        // we
        $lesson->save();

         // if there is a file in the request
         if( $request->hasFile('file')  )
         {
             $file = $request->file('file');
             // we save the extension of the file
             $extension = $file->getClientOriginalExtension();
             // we save the original file name (pathinfo() is a php function)
             $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
             // we create the filename: original_2.ext for avoiding conflict between files
             $fileNameToStore = $originalFileName . '_' . $lesson->id . '.' . $extension;
             // we set the destination path. Public_path is a Laravel helper, it will return the url of the public folder
             $destinationPath = public_path() . "/uploads/course_files";
             // we call the move method, the first parameter is the destination path and the second one is the name of the file. $uploadIsSuccessful is a flag and returns true when upload was successful
             $uploadIsSuccessful = $file->move($destinationPath, $fileNameToStore);
             // if the upload is successful we save the image path to the image column of the course table
             if($uploadIsSuccessful) { $lesson->file = $fileNameToStore; }
             // we save the course again.
             $lesson->save();
         }
        // we get redirected to the admin category route with a message of successful course creation
        return redirect()->route('admin.lessons')->with('successMsg', 'The Lesson has been successfully created!');
    }

    // edit an existing category
    public function edit($lessonId)
    // Fetches the course data from the database searching with the courseId, if it does not exist returns a 403 error page
    // If the course id exist returns the view admin.courses.edit passing the meta_title and the course variables to it
    {
        $lesson = DB::table('lessons')->find($lessonId);
        $current_category = DB::table('categories')->find($lesson->category_id);
        $courses = Course::orderBy('id', 'ASC')->get();
        $categories = Category::orderBy('id', 'ASC')->get();
        if (is_null($lesson)) {
            abort(403, 'The Lesson has not been found!');
        }
        $meta_title = "Edit a Lesson";
        return view('admin.lessons.edit', compact('meta_title', 'lesson', 'current_category', 'categories', 'courses'));
    }


    public function update(Request $request, $lessonId)
    {
        // Update function look for the course id and if not found the method findorfail will return an error message. the request, validate the data like into the store method, and redirect and return an error if validation fails.
        // It will update the data into the db and then check if there is an image into the request. It checks if the image name is already present between the asset files and if it so will unlink the old one and insert the new one.
        $lesson = Lesson::findOrFail($lessonId);
        // Validation is almost the same of the create method, but we are appending the $courseId to the unique criteria of course_title. It means that the name has to be unique, but if the course id is the same of the one that I am trying to update it could not be unique
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'integer', 'unique:lessons,id,' . $lessonId],
            // course_title is required, must be a string, max 1000 characters and has to be unique on the courses table field "title"
            'title' => ['required', 'string', 'max:1000'],
            // short_description is not required, must be a string maximum 10000 characters
            'description' => ['nullable', 'string', 'max:10000'],
            // course is required, a numeric field and must exist inside the table courses, column id
            'course' => ['required', 'numeric', 'exists:courses,id'],
            // category is required, a numeric field and must exist inside the table categories, column id
            'category' => ['required', 'numeric', 'exists:categories,id'],
            // video
            'video' => ['nullable', 'string', 'max:1000'],
            // file is not required, must be a image, accepted formats are jpeg, jpg, png and webp, not bigger than 1999 kb (< 2 Mb)
            'file' => ['nullable', 'max:1999'],
        ]);

        if( $validator->fails() )
        {
            // if validation fails we get redirected with errors
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // we insert the data
        $lesson->id = $request->id;
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->course_id = $request->course;
        $lesson->category_id = $request->category;
        $lesson->video = $request->video;
        $lesson->save();

        // same code of store method
        if( $request->hasFile('file')  )
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            $fileNameToStore = $originalFileName . '_' . $lesson->id . '.' . $extension;
            $destinationPath = public_path() . "/uploads/course_files";

            // added part to the store method. If the file exists in the destination path
            $fileExists = file_exists($destinationPath . '/' . $lesson->file);
            // if the resource is a file
            $isFile = is_file($destinationPath . '/' . $lesson->file);
            if ( $fileExists && $isFile )
            {
                // I unlink the file under the destination
                $fileDeleted = unlink($destinationPath . '/' .$lesson->file);
            }
            // I store the new file
            $uploadIsSuccessful = $file->move($destinationPath, $fileNameToStore);
            if($uploadIsSuccessful) { $lesson->file = $fileNameToStore; }
        }
        // save the updated file path into the course table
        $lesson->save();

        // redirecting to admin.courses with a success message
        return redirect()->route('admin.lessons')->with('successMsg', 'The Lesson has been successfully updated!');
    }

    public function destroy(Request $request, $lessonId)
    {
        // Destroy function will find a Category based on the $courseId that came from the route if the Category I am trying to delete exist, delete all the rows into the user_courses table where which contain the course_id and then will delete the Category and redirect with a success message
        $category = Lesson::find($lessonId);
        // if it does not find the Category
        if(is_null($category))
        {
            // will redirect back with a faliure message
            return redirect()->route('admin.lessons')->with('failureMsg', 'The Lesson with the following id could NOT be deleted: ' . $lessonId);
        }

        // after deleting all the Category associations I delete the Category itself
        $category->delete();

        return redirect()->route('admin.lessons')->with('successMsg', 'The Lesson with the following id has been successfully deleted: ' . $lessonId);
    }
}
