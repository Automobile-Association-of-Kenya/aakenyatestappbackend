<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Test;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Mail\SendVerificationCode;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use phpDocumentor\Reflection\PseudoTypes\True_;

class MobileRoutesController extends Controller
{
    public function jsonResponse($error, $message, $type, $result)
    {
        echo json_encode(array("error" => $error, "message" => $message, $type => $result));
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::all()->where('email', $request->input('email'))->first();

        if (auth()->guard('web')->attempt(['email' => $request->input('email'), 
            'password' => $request->input('password')])) {
            $user = auth()->guard('web')->user();
            return $this->jsonResponse(false, 'Successfully logged in', 'user', $user);
        }
        return $this->jsonResponse(true, 'Either the username or password is incorrect', 
            'user', null);
    }

    public function register()
    {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
            if($user){
                return $this->jsonResponse(false, 'User registered successfully', 'user', $user);
            }
            else{
                return $this->jsonResponse(True, 'Could not register user', 'user', null);
            }
    }
    public function forgot(Request $request)
    {
        $email=$request->validate([
            'email'=>'required|email'
        ]);
        
        $email=User::where('email',$email)->pluck('email')->first();
        if($email==null)
        {
            return $this->jsonResponse(true, 'We can\'t find a user with that email address.', 'email', $email);
        }
       $code= mt_rand(1000,9999);
       DB::table('mobile_resets')->insert([
           'email'=>$request->email,
           'code'=>$code,
           'created_at'=>now()
       ]);
       Mail::to($request->email)->send(new SendVerificationCode($code));
       

        return $this->jsonResponse(false, 'Reset password link sent to your email', 'email', $email);
    }
    public function verifycode(Request $request)
    {
        $request->validate([
            'email'=>'email|required',
            'code'=>'numeric',
        ]);
        $credentials=DB::table('mobile_resets')->where('email',$request->email)->where('code',$request->code)->first();
       
        if($credentials==null)
        {
            return $this->jsonResponse(true, 'Invalid code.', null, null);
        }
        $time = Carbon::now()->subHour(1);
        dd($time);
        if($credentials->created_at>=$time)
        {
            return $this->jsonResponse(true, 'Password reset code has expired.', null, null);
        }
        return $this->jsonResponse(false, 'Password reset code verification successful', 'email', $credentials);
    }

    public function reset(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|confirmed',
        ]);
        
        $user=User::where('email',$request->email)->first();
        $user->password=Hash::make($request->password);
        $user->save();
        
        return $this->jsonResponse(false, 'Password reset successfully', null, null);
    }
    public function updateprofile($id,Request $request)
    {
        $request->validate([
            'name'=>'string|required',
            'email'=>'email|required'
        ]);

        $user=User::findOrFail($id);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();

        return $this->jsonResponse(false, 'User details updated successfully', 'User', $user);
    }

    public function topics()
    {
        $topics= Topic::all();
        return $this->jsonResponse(false, 'All topics', 'Topics', $topics);
    }
    public function tests()
    {
        $tests= Test::all();
        return $this->jsonResponse(false, 'All tests', 'Tests', $tests);
    }
    public function testspertopic()
    {
        $tests=Test::all()->groupBy('topic_id');
        return $this->jsonResponse(false, 'Tests in each topic', 'topics', $tests);
    }
    public function testsinatopic($id)
    {
        $topic=Topic::findOrFail($id);
        return $this->jsonResponse(false, 'All tests in a topic','topic', $topic);
    }
    public function grade($id,Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'answer'=>'required'
        ]);

        $question=Question::findOrFail($id);
        $marks=0;
        
        if($question->type=='single')
        {
            if($request->answer=='first')
            {
                if($question->first_answer==True)
                {
                    $marks=$question->marks;
                }
            }
            else if($request->answer=='second')
            {
                if($question->second_answer==True)
                {
                    $marks=$question->marks;
                }
            }
            else if($request->answer=='third')
            {
                if($question->third_answer==True)
                {
                    $marks=$question->marks;
                }
            }
            else if($request->answer=='fourth')
            {
                if($question->fourth_answer==True)
                {
                    $marks=$question->marks;
                }
            }
        }
        else if($question->type=='multi')
        {
            $f_marks=$s_marks=$t_marks=$f_marks=null;
            if(in_array('first',$request->answer))
            {
                if($question->first_answer==True)
                {
                    $f_marks=$question->marks/4;
                }
                else
                {
                    $f_marks=0;
                }
            }
            if(in_array('second',$request->answer))
            {
                if($question->second_answer==True)
                {
                    $s_marks=$question->marks/4;
                }
                else
                {
                    $s_marks=0;
                }
            }
            if(in_array('third',$request->answer))
            {
                if($question->third_answer==True)
                {
                    $t_marks=$question->marks/4;
                }
                else
                {
                    $t_marks=0;
                }
            }
            if(in_array('fourth',$request->answer))
            {
                if($question->second_answer==True)
                {
                    $fo_marks=$question->marks/4;
                }
                else
                {
                    $fo_marks=0;
                }
            }
            $marks=$f_marks+$s_marks+$t_marks+$fo_marks;
        }
        if($question->type=='true_false')
        {
            if($request->answer=='first')
            {
                if($question->first_answer==True)
                {
                    $marks=$question->marks;
                }
            }
            else if($request->answer=='second')
            {
                if($question->second_answer==True)
                {
                    $marks=$question->marks;
                }
            }
        }
        else{
            $marks=null;
        }

        $check=Result::where('user_id',$request->user_id)->where('test_id',$question->test_id)->where('question_id',$id)->first();
        if($check==True)
        {
            $result= Result::findOrFail($check->id);
            $result->user_id=$request->user_id;
            $result->question_id=$id;
            $result->test_id=$question->test_id;
            $result->marks=$marks;
            $result->answer=$request->answer;
            $result->save();
        }
        else{
            $result=new Result;
            $result->user_id=$request->user_id;
            $result->question_id=$id;
            $result->test_id=$question->test_id;
            $result->marks=$marks;
            $result->answer=$request->answer;
            $result->save();
        }

        return $this->jsonResponse(false, 'Question results','Marks', $marks);
    }
    public function results($id,Request $request)
    {
        $request->validate([
            'user_id'=>'required',
        ]);
        $user=User::findOrFail($request->id)->first();
        $results=$user->results->where('test_id',$id);

        return $this->jsonResponse(false, 'Test results','Results', $results);
    }
}
