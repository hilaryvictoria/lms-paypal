<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course\Category;
use App\Models\Course\Course;
use Illuminate\Support\Facades\Validator;
use DB;


class CategoryController extends Controller
{
    // display all categories
    public function index()
    {
        $meta_title = "Categories";
        $categories = Category::orderBy('id', 'DESC')->paginate(5);
        return view('admin.categories.index', compact('meta_title', 'categories'));
    }

    // create a new category
    public function create()
    {
        $meta_title = "Create New Categories";
        $courses = Course::orderBy('id', 'ASC')->get();
        return view('admin.categories.create', compact('meta_title', 'courses'));
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
            ]
        );

        // we call the fails method on the validator, if it returns true it means validation may have failed at some point
        if ($validator->fails()) {
            // redirect back to the page with the error message of the validator, leaving the input fields populated as they were
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // if not failing validation I instantiate a new Course object
        $category = new Category;
        // we set a course title
        $category->title = $request->title;
        // we set a category description
        $category->description = $request->description;
        // we set a category price
        $category->course_id = $request->course;
        // we
        $category->save();
        // we get redirected to the admin category route with a message of successful course creation
        return redirect()->route('admin.categories')->with('successMsg', 'The Category has been successfully created!');
    }

    // edit an existing category
    public function edit($categoryId)
    // Fetches the course data from the database searching with the courseId, if it does not exist returns a 403 error page
    // If the course id exist returns the view admin.courses.edit passing the meta_title and the course variables to it
    {
        $category = DB::table('categories')->find($categoryId);
        $courses = Course::orderBy('id', 'ASC')->get();
        if (is_null($category)) {
            abort(403, 'The Category has not been found!');
        }
        $meta_title = "Edit a Category";
        return view('admin.categories.edit', compact('meta_title', 'category', 'courses'));
    }

    public function update(Request $request, $categoryId)
    {
        // Update function look for the course id and if not found the method findorfail will return an error message. the request, validate the data like into the store method, and redirect and return an error if validation fails.
        // It will update the data into the db and then check if there is an image into the request. It checks if the image name is already present between the asset files and if it so will unlink the old one and insert the new one.
        $category = Category::findOrFail($categoryId);

        // Validation is almost the same of the create method, but we are appending the $courseId to the unique criteria of course_title. It means that the name has to be unique, but if the course id is the same of the one that I am trying to update it could not be unique
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'integer', 'unique:categories,id,' . $categoryId],
            // course_title is required, must be a string, max 1000 characters and has to be unique on the courses table field "title"
            'title' => ['required', 'string', 'max:1000'],
            // short_description is not required, must be a string maximum 10000 characters
            'description' => ['nullable', 'string', 'max:10000'],
            // course is required, a numeric field and must exist inside the table courses, column id
            'course' => ['required', 'numeric', 'exists:courses,id'],
        ]);

        if ($validator->fails()) {
            // if validation fails we get redirected with errors
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // we insert the data
        $category->id = $request->id;
        $category->title = $request->title;
        // we set a category description
        $category->description = $request->description;
        // we set a category price
        $category->course_id = $request->course;
        // save the updated file path into the course table
        $category->save();

        // redirecting to admin.courses with a success message
        return redirect()->route('admin.categories')->with('successMsg', 'The Category has been successfully updated!');
    }

    public function destroy(Request $request, $categoryId)
    {
        // Destroy function will find a Category based on the $courseId that came from the route if the Category I am trying to delete exist, delete all the rows into the user_courses table where which contain the course_id and then will delete the Category and redirect with a success message
        $category = Category::find($categoryId);
        // if it does not find the Category
        if(is_null($category))
        {
            // will redirect back with a faliure message
            return redirect()->route('admin.categories')->with('failureMsg', 'The Category with the following id could NOT be deleted: ' . $categoryId);
        }

        // after deleting all the Category associations I delete the Category itself
        $category->delete();

        return redirect()->route('admin.categories')->with('successMsg', 'The Category with the following id has been successfully deleted: ' . $categoryId);
    }
}
