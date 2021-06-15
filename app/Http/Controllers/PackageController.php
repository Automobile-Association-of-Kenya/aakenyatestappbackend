<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages=Package::paginate(3);
        return view('packages.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.create');
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
            'name'=>'required|string|unique:packages',
            'amount'=>'integer|required',
            'duration'=>'integer|required',
            'count_topics'=>'required|string'
       ]);
       if($request->count_topics=='all' || $request->count_topics=='All')
       {
        $request->validate([
            'count_topics'=>'required|string'
       ]);
       }
       else
       {
           $request->validate([
            'count_topics'=>'integer|required',
           ]);
       }

       $package= new Package;
       $package->name=$request->name;
       $package->amount=$request->amount;
       $package->duration=$request->duration;
       $package->count_topics=$request->count_topics;
       $package->save();

       return redirect()->route('packages.index')->with('success','Payment package added successfully');
        
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
        $package=Package::findOrFail($id);
        return view('packages.edit',compact('package'));
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
            'name'=>'required|string',
            'amount'=>'integer|required',
            'duration'=>'integer|required',
            'count_topics'=>'required|string'
       ]);
       if($request->count_topics=='all' || $request->count_topics=='All')
       {
        $request->validate([
            'count_topics'=>'required|string'
       ]);
       }
       else
       {
           $request->validate([
            'count_topics'=>'integer|required',
           ]);
       }

       $package= Package::findOrFail($id);
       $package->name=$request->name;
       $package->amount=$request->amount;
       $package->duration=$request->duration;
       $package->count_topics=$request->count_topics;
       $package->save();

       return redirect()->route('packages.index')->with('success','Payment package updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package=Package::findOrFail($id);
        $package->delete();

        return redirect()->route('packages.index')->with('success','Payment package deleted successfully');
    }
}
