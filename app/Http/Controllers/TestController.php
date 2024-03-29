<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
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
        $tests=Test::paginate(3);
        return view('tests.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $topics=Topic::all();
        return view('tests.create',compact('topics'));
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
           'code'=>'required|unique:tests'
       ]);
       
       $test=new Test;
      
       $test->code=$request->code;
       $test->title=$request->title;
       $test->topic_id=$request->topic_id;
       $test->user=Auth::user()->name;
       $topic = Topic::findOrFail($request->topic_id);
       $test->order = $topic->order;
       $test->save();
       
       return redirect()->route('tests.index')->with('success','Test created successfully');

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
        $test=Test::findOrFail($id);
        $topics=Topic::all();
        $url=URL::previous();
        Session::put('url',$url);
        $questions=$test->questions()->paginate(3);

        return view('tests.edit',compact('test','topics','questions'));
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
            'code'=>'required'
        ]);
        
        $test=Test::findOrFail($id);
        $test->code=$request->code;
        $test->title=$request->title;
        $test->topic_id=$request->topic_id;
        $topic = Topic::findOrFail($request->topic_id);
        $test->order = $request->order;
        $test->save();
        $url= Session::get('url');
        return redirect($url)->with('success','Test updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test=Test::findOrFail($id);
        $test->delete();
        
        return response()->json(['status'=>'Test deleted successfully']);
    }
}
