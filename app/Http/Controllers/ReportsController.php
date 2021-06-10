<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pdf;
use App\Models\Test;
use App\Models\User;
use App\Models\Video;
use App\Models\Result;
use App\Models\Payment;
use App\Models\PdfRead;
use App\Models\VideoView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function users(Request $request)
    {

        
        $to=$request->to;
        $from=$request->from;
        $users=null;
        if($to==null||$from==null)
        {
            $users=User::where('role_id',2)->paginate(6);
        }
        else{
            $users=User::where('role_id',2)->whereBetween('created_at',[$from,$to])->paginate(6);
        }
        //dd($users);
        $dateS = Carbon::now()->startOfMonth()->subMonth(12);
        $dateE = Carbon::now()->startOfMonth(); 
   
        $data=User::select(DB::raw("COUNT(*) as count"))->whereBetween('created_at',[$dateS,$dateE])->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        //dd($data);
        $a_data=$data->toArray();
       
        $labels= User::get()->sortBy('created_at')->groupBy(function($d) {
            return Carbon::parse($d->created_at)->format('m');
        });
        $d=array_keys($labels->toArray());
        return view('reports.users',compact('users','a_data','d'));
    }
    public function tests(Request $request)
    {
        
        $to=$request->to;
        $from=$request->from;
        $users=null;
        $all_tests=null;
        if($to==null||$from==null)
        {
            $all_tests=Test::paginate(6);
            
        }
        else{
            $all_tests=Test::whereBetween('created_at',[$from,$to])->paginate(6);
        }
        $tests=Test::paginate(6);
        $results=Result::all();
        return view('reports.tests',compact('all_tests','tests','results'));
    }
    public function payments()
    {
        $payments=Payment::all();
        return view('reports.payments',compact('payments'));
    }
    public function videos()
    {
        $file_size = 0;

        foreach( File::allFiles('uploads') as $file)
        {
            $file_size += $file->getSize();
        }
      $file_size= number_format($file_size / 1048576,2);
       $videos=Video::all();
       $views=VideoView::all();
        return view('reports.videos',compact('videos','file_size','views'));
    }
    public function pdfs()
    {
        $file_size = 0;

        foreach( File::allFiles('pdfs_uploads') as $file)
        {
            $file_size += $file->getSize();
        }
      $file_size= number_format($file_size / 1048576,2);
    
       $views=PdfRead::all();
        $pdfs=Pdf::all();
        return view('reports.pdfs',compact('pdfs','views','file_size'));
    }
}
