<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Topic;
use App\Models\Question;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class QuestionController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $topics=Topic::all();
        $test=Test::findOrFail($id);
        return view('questions.create',compact('test','topics'));
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
             'question'=>'string|required',
             'marks'=>'integer|required'
         ]);
       // dd($request->multi);
        $question= new Question;
        $question->question=$request->question;
        $question->test_id=$request->test_id;
        $question->topic_id=$request->topic_id;
        $question->marks=$request->marks;
        
        $question->type='essay';

        $question->first_choice=null;
        $question->second_choice=null;
        $question->third_choice=null;
        $question->fourth_choice=null;
        
        $question->first_answer=FALSE;
        $question->second_answer=FALSE;
        $question->third_answer=FALSE;
        $question->fourth_answer=FALSE;
        
        if($request->type==0)
        {
            return redirect()->back()->with('error','Please select question type');
        }
        else if($request->type==1)
        {
            $request->validate([
                'single_first'=>'required',
                'single_second'=>'required',
                'single_third'=>'required',
                'single_fourth'=>'required',
                'single'=>'required'
            ]);
            
            $question->type='single';

            $question->first_choice=$request->single_first;
            $question->second_choice=$request->single_second;
            $question->third_choice=$request->single_third;
            $question->fourth_choice=$request->single_fourth;

                if($request->single=='first')
                {
                    $question->first_answer=TRUE;
                }
                else if($request->single=='second')
                {
                    $question->second_answer=TRUE;
                }
                else if($request->single=='third')
                {
                    $question->third_answer=TRUE;
                }
                else if($request->single=='fourth')
                {
                    $question->fourth_answer=TRUE;
                }
            
        }
        else if($request->type==2)
        {
            $request->validate([
                'multi_first'=>'required',
                'multi_second'=>'required',
                'multi_third'=>'required',
                'multi_fourth'=>'required',
                'multi'=>'required'
            ]);
            
            $question->type='multi';

            $question->first_choice=$request->multi_first;
            $question->second_choice=$request->multi_second;
            $question->third_choice=$request->multi_third;
            $question->fourth_choice=$request->multi_fourth;
            
            if(in_array('first',$request->multi))
            {
                $question->first_answer=TRUE;
            }
            if(in_array('second',$request->multi))
            {
                $question->second_answer=TRUE;
            }
            if(in_array('third',$request->multi))
            {
                $question->third_answer=TRUE;
            }
            if(in_array('fourth',$request->multi))
            {
                $question->third_answer=TRUE;
            }
        }
        else if($request->type==3)
        {
            $request->validate([
                'true_false'=>'required'
            ]);
            
            $question->type='true_false';

            if($request->true_false=='true')
            {
                $question->first_answer=TRUE;
            }
            if($request->true_false=='false')
            {
                $question->second_answer=TRUE;
            }
        }
        
        if($request->has('image'))
        {
            $request->validate([
                'thumbnail'=>'mimes:jpeg,jpg,png,gif,svg'
            ]);
            $image=$request->image;
        
            $imageName=time()."_.".$image->getClientOriginalExtension();

            Image::configure(array('driver' => 'imagick'));
            $image = Image::make($image->getRealPath())->resize(300, 200);
          
            $image->save(public_path("Images/".$imageName),90);
            
            $question->photo=$imageName;
           
        }
        $question->save();
        return redirect()->route('tests.edit',$question->test_id)->with('success','Question added successfully');
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
        $question=Question::findOrFail($id);
        $topics=Topic::all();

        return view('questions.edit',compact('question','topics'));
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
            'question'=>'required',
            'marks'=>'numeric|required'
        ]);
        
        $question=Question::findOrFail($id);
        $question->question=$request->question;
        $question->topic_id=$request->topic_id;
        $question->marks=$request->marks;

        $question->type='essay';

        $question->first_choice=$question->first_choice;
        $question->second_choice=$question->second_choice;
        $question->third_choice=$question->third_choice;
        $question->fourth_choice=$question->fourth_choice;
        
        $question->first_answer=$question->first_answer;
        $question->second_answer=$question->second_answer;
        $question->third_answer=$question->third_answer;
        $question->fourth_answer=$question->fourth_answer;
        
        if($request->type==0)
        {
            return redirect()->back()->with('error','Please select question type');
        }
        else if($request->type==1)
        {
            $request->validate([
                'single_first'=>'required',
                'single_second'=>'required',
                'single_third'=>'required',
                'single_fourth'=>'required',
                'single'=>'required'
            ]);
            
            $question->type='single';

            $question->first_choice=$request->single_first;
            $question->second_choice=$request->single_second;
            $question->third_choice=$request->single_third;
            $question->fourth_choice=$request->single_fourth;

                if($request->single=='first')
                {
                    $question->first_answer=TRUE;
                    $question->second_answer=FALSE;
                    $question->third_answer=FALSE;
                    $question->fourth_answer=FALSE;
                }
                else if($request->single=='second')
                {
                    $question->first_answer=FALSE;
                    $question->second_answer=TRUE;
                    $question->third_answer=FALSE;
                    $question->fourth_answer=FALSE;
                }
                else if($request->single=='third')
                {
                    $question->first_answer=FALSE;
                    $question->second_answer=FALSE;
                    $question->third_answer=TRUE;
                    $question->fourth_answer=FALSE;
                }
                else if($request->single=='fourth')
                {
                    $question->first_answer=FALSE;
                    $question->second_answer=FALSE;
                    $question->third_answer=FALSE;
                    $question->fourth_answer=TRUE;
                }
            
        }
        else if($request->type==2)
        {
            $request->validate([
                'multi_first'=>'required',
                'multi_second'=>'required',
                'multi_third'=>'required',
                'multi_fourth'=>'required',
                'multi'=>'required'
            ]);
            
            $question->type='multi';

            $question->first_choice=$request->multi_first;
            $question->second_choice=$request->multi_second;
            $question->third_choice=$request->multi_third;
            $question->fourth_choice=$request->multi_fourth;
            
            $question->first_answer=FALSE;
            $question->second_answer=FALSE;
            $question->third_answer=FALSE;
            $question->fourth_answer=FALSE;

            if(in_array('first',$request->multi))
            {
                $question->first_answer=TRUE;
            }
            if(in_array('second',$request->multi))
            {
                $question->second_answer=TRUE;
            }
            if(in_array('third',$request->multi))
            {
                $question->third_answer=TRUE;
            }
            if(in_array('fourth',$request->multi))
            {
                $question->fourth_answer=TRUE;
            }
        }
        else if($request->type==3)
        {
            $request->validate([
                'true_false'=>'required'
            ]);
            
            $question->type='true_false';
            $question->first_answer=FALSE;
            $question->second_answer=FALSE;
            $question->third_answer=FALSE;
            $question->fourth_answer=FALSE;

            if($request->true_false=='true')
            {
                $question->first_answer=TRUE;
            }
            if($request->true_false=='false')
            {
                $question->second_answer=TRUE;
            }
        }
        
        if($request->has('image'))
        {
            $request->validate([
                'thumbnail'=>'mimes:jpeg,jpg,png,gif,svg'
            ]);
            $image=$request->image;
        
            $imageName=time()."_.".$image->getClientOriginalExtension();

            Image::configure(array('driver' => 'imagick'));
            $image = Image::make($image->getRealPath())->resize(300, 200);
          
            $image->save(public_path("Images/".$imageName),90);
            
            $question->photo=$imageName;
        }
        $question->save();
        return redirect()->route('tests.edit',$question->test_id)->with('success','Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question=Question::findOrFail($id);
        $question->delete();
        
        return response()->json(['status'=>'Question deleted successfully']);
    }
}
