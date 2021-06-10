<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pdf;
use App\Models\Test;
use App\Models\User;
use App\Models\Topic;
use App\Models\Video;
use App\Models\Result;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Mail\SendVerificationCode;
use App\Models\Payment;
use App\Models\PdfRead;
use App\Models\VideoView;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
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

    public function register(Request $request)
    {
        
        $data = Validator::make($request->all(),[
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone'=>['']
        ]);
       
        if($data->fails())
        {
            return $this->jsonResponse(true, 'Invalid credentials', 'Error', $data->messages());
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
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
        DB::table('mobile_resets')->where('email',$request->email)->where('code',$request->code)->delete();
        return $this->jsonResponse(false, 'Password reset code verification successful', 'email', $credentials);
    }

    public function reset(Request $request)
    {
        $credentials = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|min:8|confirmed',
        ]);
        if($credentials->fails())
        {
            return $this->jsonResponse(true, 'Invalid credentials', null, $credentials->messages());
        }
        $user=User::where('email',$request->email)->first();
        $user->password=Hash::make($request->password);
        $user->save();
        
        return $this->jsonResponse(false, 'Password reset successfully', null, null);
    }
    public function updateprofile($id,Request $request)
    {
        $request->validate([
            'name'=>'string|required',
            'email'=>'email|required',
            'phone'=>''
        ]);

        $user=User::findOrFail($id);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
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
    public function scores(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'test_id'=>'required',
            'score'=>'required'
        ]);

        $result=new Result;
        $result->user_id=$request->user_id;
        $result->test_id=$request->test_id;
        $result->score=$request->score;
        $result->save();
        
        return $this->jsonResponse(false, 'Results saved','Results', $result);
    }
    public function results(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
        ]);
        $user=User::findOrFail($request->user_id);
        $results=$user->results;
            
        return $this->jsonResponse(false, 'Test results','Results', $results);
    }
    public function googlelogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'name'=>'string|required'
        ]);
        $user=User::where('email',$request->email)->first();
        
        if($user==null)
        {
            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->provider='Google';
            $user->role_id=2;
            $user->password='google';
            $user->save();
        }

    return $this->jsonResponse(false, 'Authentication successful','user', $user);
    }
    public function videos()
    {
        $videos= Video::all();
        return $this->jsonResponse(false, 'All Videos', 'Videos', $videos);
    }
    public function video($id)
    {
        $video= Video::findOrFail($id);
        return $this->jsonResponse(false, 'View Video', 'Video', $video);
    }
    public function pdfs()
    {
        $pdfs= Pdf::all();
        return $this->jsonResponse(false, 'All PDFs', 'PDFs', $pdfs);
    }
    public function pdf($id)
    {
        $pdf= PDF::findOrFail($id);
        return $this->jsonResponse(false, 'View PDF', 'PDF', $pdf);
    }
    public function payments(Request $request)
    {
        $payment= new Payment;
        $payment->user_id=$request->user_id;
        $payment->reference_code=$request->code;
        $payment->amount=$request->amount;
        $payment->save();

        return $this->jsonResponse(false, 'Payment saved successful', 'Payment', $payment);
    }
    public function videoviews(Request $request)
    {
        $view=new VideoView;
        $view->user_id=$request->user_id;
        $view->video_id=$request->video_id;
        $view->save();

        return $this->jsonResponse(false, 'Video viewed', 'view', $view);
    }
    public function pdfreads(Request $request)
    {
        $read=new PdfRead;
        $read->user_id=$request->user_id;
        $read->pdf_id=$request->pdf_id;
        $read->save();

        return $this->jsonResponse(false, 'PDF read', 'read', $read);
    }
    
}
