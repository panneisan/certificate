<?php

namespace App\Http\Controllers;

use App\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batch = Batch::latest()->get();
        return view("batch.index",compact('batch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batch = Batch::latest()->get()->take(1);
        return view('batch.create',compact('batch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "course_id"=> "required",
            "start_time" => "required",
            "end_time" => "required",
            "fees" => "required",
        ]);

        $batch = new Batch();
        $batch->title = $request->title;
        $batch->start_date = $request->start_date;
        $batch->end_date = $request->end_date;
        $batch->course_id = $request->course_id;
        $batch->start_time=$request->start_time;
        $batch->end_time=$request->end_time;
        $batch->fees = $request->fees;
        $batch->save();

        return redirect()->route('batch.create')->with("toast","<b>$batch->title</b> is successfully uploaded 😊");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
//        $batch = Batch::where("id","$batch->id")->get();
//        return view("batch.show",compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        $latest = Batch::latest()->get()->take(1);
        return view("batch.edit",compact('batch','latest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        $request->validate([
            "title" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "course_id"=> "required",
            "start_time" => "required",
            "end_time" => "required",
            "fees" => "required",
        ]);

        $batch->title = $request->title;
        $batch->start_date = $request->start_date;
        $batch->end_date = $request->end_date;
        $batch->course_id = $request->course_id;
        $batch->start_time=$request->start_time;
        $batch->end_time=$request->end_time;
        $batch->fees = $request->fees;
        $batch->update();

        return redirect()->route('batch.create')->with("toast","<b>$batch->title</b> is successfully updated 😊");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();

        return redirect()->route("batch.index")->with("toast","<b>$batch->title</b> is successfully deleted 😊");
    }
}
