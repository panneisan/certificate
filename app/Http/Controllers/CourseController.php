<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = new Course();
        $list= $course->latest()->get();
        return view("course.courseList",compact("list"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        $request->validate([
            'title'=>'required|min:4',
            'outline'=>'required',
            'photo'=>'required|mimes:png,jpg,gif,jpeg'
        ]);
        $dir ='gallery/';
        $newName=uniqid()."_image.".$request->file("photo")->getClientOriginalExtension();
        $request->file('photo')->move($dir,$newName);

        $course =new Course();
        $course->title =$request->title;
        $course->outline =$request->outline;
        $course->photo=$dir.$newName;
        $course->save();

        return redirect()->route("course.create")->with("toast","<b>$course->title</b> is successfully Added 😊");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {    $info = $course;
         return view("course.course-edit",compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $info = $course;
        return view("course.course-edit" ,compact('info'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title'=>'required|min:4',
            'outline'=>'required',
            'photo'=>'required|mimes:png,jpg,gif,jpeg'
        ]);
        $course->title = $request->title;
        $course->outline= $request->outline;
        if($request->hasFile("photo")){

            $dir ='gallery/';
            $newName=uniqid()."_image.".$request->file("photo")->getClientOriginalExtension();
            $request->file('photo')->move($dir,$newName);
            $course->photo=$dir.$newName;
        }

        $course->update();

        return redirect()->route("course.index")->with("toast","<b>$course->title</b> is successfully Updated 😊");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $name=$course->title;
        $course->delete();
        return redirect()->back()->with("toast","<b>$name</b> is successfully Deleted 😊");

    }
}
