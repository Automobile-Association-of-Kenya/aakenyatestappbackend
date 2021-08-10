@extends('layouts.main')
@section('title')
    <title>Today Payment Reports</title>
@endsection
@section('content')
    <section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Today Payment Reports</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item active">Payment Reports</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Today Payment</strong> Records</h2>
                            <div class="body">
                                        <div class="col-lg-3 col-md-3 col-sm- ">
                                            <form action="{{route('pdf.todaypayments')}}" method="POST">
                                                @csrf
                            
                                                <button class="btn btn-primary btn-small" type="submit"><i class="zmdi zmdi-print text-white"></i></button>
                                            </form>              
                                        </div>
                                    </div>
                            </div>
                        <div class="table-responsive">
                            <table class="table table-hover c_table">
                                <thead>
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th>MPESA Code</th>
                                        <th>User Name</th>
                                        <th>Phone Number</th>
                                        <th>Date</th>
                                        <th>Amount</th>   
                                        <th>Package</th>                                 
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($today_payments as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->reference_code}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->paying_phone_no !=null ? $item->paying_phone_no : $item->user->phone  }}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->amount}}</td>
                                        <td>{{$item->package->name}}</td>
                                    </tr>
                                    @empty
                                        <td>No payment records to show</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <span class="text-primary">{{$today_payments->links()}}</span> 
                </div>
            </div>       
        </div>
    </div>
</section>
@endsection
