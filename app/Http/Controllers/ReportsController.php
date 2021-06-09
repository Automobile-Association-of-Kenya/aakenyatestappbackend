<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use App\Models\Test;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function users()
    {
        $users=User::where('role_id',2)->paginate(6);
        return view('reports.users',compact('users'));
    }
    public function tests()
    {
        $tests=Test::paginate(6);
        return view('reports.tests',compact('tests'));
    }
    public function payments()
    {
        return view('reports.payments');
    }
    public function videos()
    {
       $videos=Video::all();
        return view('reports.videos',compact('videos'));
    }
    public function pdfs()
    {
       $pdfs=Pdf::all();
        return view('reports.pdfs',compact('pdfs'));
    }
}
