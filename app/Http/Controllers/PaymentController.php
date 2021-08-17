<?php

namespace App\Http\Controllers;

use App\Models\MpesaTransaction;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=Payment::orderBy('created_at','DESC')->groupBy('reference_code')->paginate(10);
        return view('payments.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages=Package::all();
        $topics=Topic::all();
        return view('payments.create',compact('packages','topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->access==0)
        {
            return redirect()->back()->with('error','Please select format type');
        }
        else if($request->access==1)
        {
            $request->validate([
                'email'=>'email|required|exists:users,email',
                'reference_code'=>'string|required|unique:payments',
                'amount'=>'integer|required',
                'topics'=>'required'
            ]);
            $package=Package::findOrFail($request->package_id);
            if($package->amount>$request->amount)
            {
                return redirect()->back()->with('error','Payment amount is too low for the selected package');
            }
            if($package->amount<$request->amount)
            {
                return redirect()->back()->with('error','Payment amount is too high for the selected package');
            }
            if(count(array($request->topics))>$package->count_topics)
            {
                return redirect()->back()->with('error','The selected topics are too many for the package');
            }
            
            $user=User::where('email',$request->email)->first();
            if($user)
            {
                $payment= new Payment();
                $payment->user_id=$user->id;
                $payment->reference_code=$request->reference_code;
                $payment->amount=$request->amount;
                $payment->topics=$request->topics;
                $payment->package_id=$request->package_id;
                $payment->paying_phone_no=$user->phone;
                $payment->save();
                
             return redirect()->route('payments.index')->with('success','Payment made successfully');
                
            }
        }
        else if($request->access==2)
        {
            $request->validate([
                'email'=>'email|required|exists:users,email',
                'topics'=>'required'
            ]);
            $package=Package::findOrFail($request->package_id);
         
            $user=User::where('email',$request->email)->first();
            if($user)
            {
                $payment= new Payment();
                $payment->user_id=$user->id;
                $payment->reference_code='free access';
                $payment->amount=0;
                $payment->topics=$request->topics;
                $payment->package_id=$request->package_id;
                $payment->paying_phone_no=$user->phone;
                $payment->save();
                
                    return redirect()->route('payments.index')->with('success','Payment made successfully');
                
            }
        }
        else{
            return redirect()->back()->with('error','There was an error in the adding payment. Try again');
        }
       
    }

    public function transactions(Request $request)
    {
        $search=$request->search;
        if($search==null||$search==0)
        {
            $transactions= MpesaTransaction::orderBy('created_at','DESC')->paginate(10);
        }
        else if($search==1){
            $transactions= MpesaTransaction::where('ResultCode',0.00)->orderBy('created_at','DESC')->paginate(10);
        }
        else{
            $transactions= MpesaTransaction::where('ResultCode','!=',0.00)->orderBy('created_at','DESC')->paginate(10);
        }
        return view('payments.transactions',compact('transactions','search'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
