<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pdf as PDFM;
use App\Models\Test;
use App\Models\User;
use App\Models\Video;
use App\Models\Result;
use App\Models\Payment;
use App\Models\PdfRead;
use Barryvdh\DomPDF\Facade as pdfs;
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
      
        $period = now()->subMonths(11)->monthsUntil(now());
        $data = [];
        foreach ($period as $date)
        {
           $data[] = [
               'month' => $date->shortMonthName,
               'year' => $date->year,
           ];
        }
       $_1=strval($data[0]['year'].'-'.$data[0]['month']);
       $_2=strval($data[1]['year'].'-'.$data[1]['month']);
       $_3=strval($data[2]['year'].'-'.$data[2]['month']);
       $_4=strval($data[3]['year'].'-'.$data[3]['month']);
       $_5=strval($data[4]['year'].'-'.$data[4]['month']);
       $_6=strval($data[5]['year'].'-'.$data[5]['month']);
       $_7=strval($data[6]['year'].'-'.$data[6]['month']);
       $_8=strval($data[7]['year'].'-'.$data[7]['month']);
       $_9=strval($data[8]['year'].'-'.$data[8]['month']);
       $_10=strval($data[9]['year'].'-'.$data[9]['month']);
       $_11=strval($data[10]['year'].'-'.$data[10]['month']);
       $_12=strval($data[11]['year'].'-'.$data[11]['month']);
      // dd(date('m',strtotime($data[12]['month'])));
      $c_1=User::whereMonth('created_at',date('m',strtotime($data[0]['month'])))->count();
      $c_2=User::whereMonth('created_at',date('m',strtotime($data[1]['month'])))->count();
      $c_3=User::whereMonth('created_at',date('m',strtotime($data[2]['month'])))->count();
      $c_4=User::whereMonth('created_at',date('m',strtotime($data[3]['month'])))->count();
      $c_5=User::whereMonth('created_at',date('m',strtotime($data[4]['month'])))->count();
      $c_6=User::whereMonth('created_at',date('m',strtotime($data[5]['month'])))->count();
      $c_7=User::whereMonth('created_at',date('m',strtotime($data[6]['month'])))->count();
      $c_8=User::whereMonth('created_at',date('m',strtotime($data[7]['month'])))->count();
      $c_9=User::whereMonth('created_at',date('m',strtotime($data[8]['month'])))->count();
      $c_10=User::whereMonth('created_at',date('m',strtotime($data[9]['month'])))->count();
      $c_11=User::whereMonth('created_at',date('m',strtotime($data[10]['month'])))->count();
      $c_12=User::whereMonth('created_at',date('m',strtotime($data[11]['month'])))->count();

    $d=array($_1,$_2,$_3,$_4,$_5,$_6,$_7,$_8,$_9,$_10,$_11,$_12);
    $a_data=array($c_1,$c_2,$c_3,$c_4,$c_5,$c_6,$c_7,$c_8,$c_9,$c_10,$c_11,$c_12);
        return view('reports.users',compact('users','a_data','d','to','from'));
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
        return view('reports.tests',compact('all_tests','tests','results','to','from'));
    }
    public function payments(Request $request)
    {
        $to=$request->to;
        $from=$request->from;
        $users=null;
        $payments=null;
        if($to==null||$from==null)
        {
            $payments=Payment::paginate(6);
            
        }
        else{
            $payments=Payment::whereBetween('created_at',[$from,$to])->paginate(6);
        }
       
        $current_month= Payment::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('amount');
       $current_year=Payment::whereYear('created_at',date('Y'))->sum('amount');
       $total=Payment::all()->sum('amount');

        $period = now()->subMonths(11)->monthsUntil(now());
        $data = [];
        foreach ($period as $date)
        {
           $data[] = [
               'month' => $date->shortMonthName,
               'year' => $date->year,
           ];
        }
       $_1=date('Y-m',strtotime($data[0]['year'].'-'.$data[0]['month']));
       $_2=date('Y-m',strtotime($data[1]['year'].'-'.$data[1]['month']));
       $_3=date('Y-m',strtotime($data[2]['year'].'-'.$data[2]['month']));
       $_4=date('Y-m',strtotime($data[3]['year'].'-'.$data[3]['month']));
       $_5=date('Y-m',strtotime($data[4]['year'].'-'.$data[4]['month']));
       $_6=date('Y-m',strtotime($data[5]['year'].'-'.$data[5]['month']));
       $_7=date('Y-m',strtotime($data[6]['year'].'-'.$data[6]['month']));
       $_8=date('Y-m',strtotime($data[7]['year'].'-'.$data[7]['month']));
       $_9=date('Y-m',strtotime($data[8]['year'].'-'.$data[8]['month']));
       $_10=date('Y-m',strtotime($data[9]['year'].'-'.$data[9]['month']));
       $_11=date('Y-m',strtotime($data[10]['year'].'-'.$data[10]['month']));
       $_12=date('Y-m',strtotime($data[11]['year'].'-'.$data[11]['month']));
      // dd(date('m',strtotime($data[12]['month'])));
      $c_1=Payment::whereMonth('created_at',date('m',strtotime($data[0]['month'])))->sum('amount');
      $c_2=Payment::whereMonth('created_at',date('m',strtotime($data[1]['month'])))->sum('amount');
      $c_3=Payment::whereMonth('created_at',date('m',strtotime($data[2]['month'])))->sum('amount');
      $c_4=Payment::whereMonth('created_at',date('m',strtotime($data[3]['month'])))->sum('amount');
      $c_5=Payment::whereMonth('created_at',date('m',strtotime($data[4]['month'])))->sum('amount');
      $c_6=Payment::whereMonth('created_at',date('m',strtotime($data[5]['month'])))->sum('amount');
      $c_7=Payment::whereMonth('created_at',date('m',strtotime($data[6]['month'])))->sum('amount');
      $c_8=Payment::whereMonth('created_at',date('m',strtotime($data[7]['month'])))->sum('amount');
      $c_9=Payment::whereMonth('created_at',date('m',strtotime($data[8]['month'])))->sum('amount');
      $c_10=Payment::whereMonth('created_at',date('m',strtotime($data[9]['month'])))->sum('amount');
      $c_11=Payment::whereMonth('created_at',date('m',strtotime($data[10]['month'])))->sum('amount');
      $c_12=Payment::whereMonth('created_at',date('m',strtotime($data[11]['month'])))->sum('amount');

    $data=array($_1,$_2,$_3,$_4,$_5,$_6,$_7,$_8,$_9,$_10,$_11,$_12);
    $paymentmcount=array($c_1,$c_2,$c_3,$c_4,$c_5,$c_6,$c_7,$c_8,$c_9,$c_10,$c_11,$c_12);
    return view('reports.payments',compact('paymentmcount','payments','to','from','data','total','current_year','current_month'));
    }
    public function videos(Request $request)
    {
        $to=$request->to;
        $from=$request->from;
        $users=null;
        $videos=null;
        if($to==null||$from==null)
        {
            $videos=Video::paginate(6);
            
        }
        else{
            $videos=Video::whereBetween('created_at',[$from,$to])->paginate(6);
        }
        $df = disk_free_space("/");
        //dd($df/1048576);
        $file_size = 0;
        foreach( File::allFiles('uploads') as $file)
        {
            $file_size += $file->getSize();
        }
      $file_size= number_format($file_size / 1048576,2);
      $remaining=($file_size/$df)*100;
      //dd($remaining);
       $all_videos=Video::all();
       $views=VideoView::all();
        return view('reports.videos',compact('all_videos','to','from','videos','file_size','views','remaining'));
    }
    public function pdfs(Request $request)
    {
        $to=$request->to;
        $from=$request->from;
        $pdfs=null;
        if($to==null||$from==null)
        {
            $pdfs=PDFM::paginate(6);
            
        }
        else{
            $pdfs=PDFM::whereBetween('created_at',[$from,$to])->paginate(6);
        }
        $df = disk_free_space("/");
        //dd($df/1048576);
        $file_size = 0;
        foreach( File::allFiles('pdfs_uploads') as $file)
        {
            $file_size += $file->getSize();
        }
      $file_size= number_format($file_size / 1048576,2);
      $remaining=($file_size/$df)*100;
    
       $views=PdfRead::all();
   
        return view('reports.pdfs',compact('from','to','remaining','pdfs','views','file_size'));
    }
    public function pdfusers(Request $request)
    {
       
        $to=$request->to;
        $from=$request->from;
        $users=null;
        if($to==null||$from==null)
        {
            $users=User::where('role_id',2)->get();
        }
        else{
            $users=User::where('role_id',2)->whereBetween('created_at',[$from,$to])->get();
        }
      
      view()->share('users',$users);
      $pdf = pdfs::loadView('reports.pdf.users', $users);

      // download PDF file with download method
      return $pdf->stream();
    }
    public function pdftests(Request $request)
    {
       
        $to=$request->to;
        $from=$request->from;
        $all_tests=null;
        if($to==null||$from==null)
        {
            $all_tests=Test::all();
            
        }
        else{
            $all_tests=Test::whereBetween('created_at',[$from,$to])->get();
        }
      
     view()->share('all_tests',$all_tests);
      $pdf = pdfs::loadView('reports.pdf.tests',$all_tests);


      return $pdf->stream();
    }
    public function pdfpayments(Request $request)
    {
        $to=$request->to;
        $from=$request->from;
        $payments=null;
        if($to==null||$from==null)
        {
            $payments=Payment::all();
        }
        else{
            $payments=Payment::whereBetween('created_at',[$from,$to])->get();
        }
      
      view()->share('payments',$payments);
      $pdf = pdfs::loadView('reports.pdf.payments', $payments);

      // download PDF file with download method
      return $pdf->stream();
    }
    public function pdfvideos(Request $request)
    {
        $to=$request->to;
        $from=$request->from;
        $payments=null;
        if($to==null||$from==null)
        {
            $videos=Video::all();
        }
        else{
            $videos=Video::whereBetween('created_at',[$from,$to])->get();
        }
      
      view()->share('videos',$videos);
      $pdf = pdfs::loadView('reports.pdf.videos', $videos);

      // download PDF file with download method
      return $pdf->stream();
    }
    public function pdfpdfs(Request $request)
    {
        $to=$request->to;
        $from=$request->from;
        $pdfs=null;
        if($to==null||$from==null)
        {
            $pdfs=PDFM::all();   
        }
        else{
            $pdfs=PDFM::whereBetween('created_at',[$from,$to])->get();
        }
      
      view()->share('pdfs',$pdfs);
      $pdf = pdfs::loadView('reports.pdf.pdfs', $pdfs);

      // download PDF file with download method
      return $pdf->stream();
    }
}