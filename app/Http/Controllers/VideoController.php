<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos=Video::all();
        return view('videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics=Topic::all();
        return view('videos.create',compact('topics'));
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
            'title'=>'required|string',
            'video'=>'required|mimes:mp4,mkv,mov,ogg,qt'
        ]);
      
        $video=$request->video;
        $video_name=time().'_.'.$video->getClientOriginalName();
        $video->move(public_path("uploads"), $video_name);

        $video= new Video;
        $video->title=$request->title;
        $video->topic_id=$request->topic_id;
        $video->video=$video_name;
        $video->save();
    
         return redirect()->route('videos.index')->with('success','Video added successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video= Video::findOrFail($id);
        $topics=Topic::all();
        return view('videos.edit',compact('video','topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|string',
        ]);
      
        $video= Video::findOrFail($id);
        $video_name=$video->video;
        if($request->hasFile('video'))
        {
            $request->validate([
                'video'=>'required|mimes:mp4,mkv,mov,ogg,qt'
            ]);
          
            $video_file=$request->video;
            $video_name=time().'_.'.$video_file->getClientOriginalName();
            $video_file->move(public_path("uploads"), $video_name);
        }
        
        $video->title=$request->title;
        $video->topic_id=$request->topic_id;
        $video->video=$video_name;
        $video->save();
    
         return redirect()->route('videos.index')->with('success','Video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video=Video::findOrFail($id);
        $video->delete();

        return redirect()->route('videos.index')->with('success','Video deleted successfully');
    }
}
