<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics=Topic::paginate(5);
        return view('topics.index',compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topics.create');
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
            'title'=>'required|string|unique:topics',
            'description'=>'required|string',
            
        ]);
    
        if($request->free==0)
        {
            return redirect()->back()->withErrors('Please select whether the topic is free or paid');
        }
        $topic=new Topic;
        $topic->title=$request->title;
        $topic->description=$request->description;
        $topic->user=Auth::user()->name;
        $topic->free=True;
        if($request->free==1)
        {
            $topic->free=True;
        }
        else if($request->free==2)
        {
            $topic->free=False;
        }
        $topic->save();
        return redirect()->route('topics.index')->with('success','Topic added successfully');
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
        $topic=Topic::findOrFail($id);
        return view('topics.edit',compact('topic'));
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
            'title'=>'required',
            'description'=>'required'
        ]);
        $topic=Topic::findOrFail($id);
        $topic->title=$request->title;
        $topic->description=$request->description;
        if($request->free==0)
        {
            return redirect()->back()->withErrors('Please select whether the topic is free or paid');
        }
        else if($request->free==2)
        {
            $topic->free=False;
        }
        else if($request->free==1)
        {
            $topic->free=True;
        }
        $topic->save();

        return redirect()->route('topics.index')->with('success','Topic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic=Topic::findOrFail($id);
        $topic->delete();

        return response()->json(['status'=>'Topic deleted successfully']);
    }
}
