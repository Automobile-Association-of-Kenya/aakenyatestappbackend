<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Test;
use App\Models\User;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('privacy');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $users=User::where('role_id',2)->count();
       $tests=Test::all();
       $questions=Question::all()->count();
       $payments=Payment::orderBy('created_at','DESC')->get();
        return view('dashboard.index',compact('users','tests','questions','payments'));
    }
    public function profile($id)
    {
        $profile=User::findOrFail($id);
        return view('dashboard.profile',compact('profile'));
    }
    public function update($id,Request $request)
    {
        $profile=User::findOrFail($id);
        $request->validate([
            'name'=>'string|required',
            'email'=>'required|email',
            'phone'=>'required|numeric|min:10'
        ]);
        $profile->name=$request->name;
        $profile->email=$request->email;
        $profile->phone=$request->phone;
        $photo_name=$profile->photo;
        if($request->has('image'))
        {
            $request->validate([
                'image'=>'required|mimes:jpeg,jpg,png,gif,svg'
            ]);
            $photo=$request->image;
            $img=Image::make($photo);
            $img->resize(590,590);
            $p_name=time().'.'.$photo->getClientOriginalExtension();
            $img->save(public_path("Images/".$p_name));
            $photo_name=$p_name;
        }

        $profile->photo=$photo_name;
        $profile->save();
        return redirect()->back()->with('success','Profile updated successfully');
    }
    public function password()
    {
        return view('dashboard.password');
    }
    public function change($id,Request $request)
    {
        $request->validate([
            'old'=>['required',new MatchOldPassword],
            'password'=>['required','string','min:8','confirmed']
        ]);
        $user=User::findOrFail($id);
        $user->password=Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success','Password changed successfully');
    }
    public function privacy()
    {
        If(Auth::check())
        {
            return view('dashboard.privacy');
        }
        else{
            return view('dashboard.privacy2');
        }
    }
}

