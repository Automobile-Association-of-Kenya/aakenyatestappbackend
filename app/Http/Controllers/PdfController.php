<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PdfController extends Controller
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
        $pdfs=Pdf::all();
        return view('pdfs.index',compact('pdfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics=Topic::all();
        return view('pdfs.create',compact('topics'));
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
            'pdf'=>'required|mimes:pdf'
        ]);
      
        $pdf=$request->pdf;
        $pdf_name=time().'.'.$pdf->getClientOriginalExtension();
        $pdf->move(public_path("pdfs_uploads"), $pdf_name);

        $pdf= new PDF;
        $pdf->title=$request->title;
        $pdf->topic_id=$request->topic_id;
        $pdf->pdf=$pdf_name;
        $pdf->save();
    
         return redirect()->route('pdfs.index')->with('success','PDF added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $pdf=Pdf::findOrFail($id);
        $file= public_path(). "/pdfs_uploads/".$pdf->pdf;
        $file_name=$pdf->title.'.pdf';
        $headers = [
            'Content-Type' => 'application/pdf',
         ];
    
        return Response::download($file, $file_name, $headers);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pdf= Pdf::findOrFail($id);
        $topics=Topic::all();
        return view('pdfs.edit',compact('pdf','topics'));
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
      
        $pdf= PDF::findOrFail($id);
        $pdf_name=$pdf->pdf;
        if($request->hasFile('pdf'))
        {
            $request->validate([
                'pdf'=>'required|mimes:pdf'
            ]);
          
            $pdf_file=$request->pdf;
            $pdf_name=time().'.'.$pdf->getClientOriginalExtension();
            $pdf_file->move(public_path("pdfs_uploads"), $pdf_name);
        }
        
        $pdf->title=$request->title;
        $pdf->topic_id=$request->topic_id;
        $pdf->pdf=$pdf_name;
        $pdf->save();
    
         return redirect()->route('pdfs.index')->with('success','PDF updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pdf=Pdf::findOrFail($id);
        $pdf->delete();

        return response()->json(['status'=>'PDF deleted successfully']);
    }
}
