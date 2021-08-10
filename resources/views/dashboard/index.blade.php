@extends('layouts.main')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
<section class="content">
    <div class="body_scroll">    
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2> Dashboard</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AA Kenya</a></li>
                    
                        <li class="breadcrumb-item active">Dashboard</li>
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
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body xl-blue">
                            <h4 class="mt-0 mb-0"  style="color: #055f43">{{$users->count()}}</h4>
                            <p class="mb-0" style="color: rgb(5,95,67)">Total Users</p>                        
                            <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#222"
                            data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(0, 150, 136)" data-spot-Color="rgb(0, 188, 212)"
                            data-offset="90" data-width="100%" data-height="40px" data-line-Width="2" data-line-Color="rgb(5,95,67)"
                            data-fill-Color="transparent"> 7,6,7,8,5,9,8,6,7 </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body xl-purple">
                            <h4 class="mt-0 mb-0">{{$users->whereDate('created_at',today())->count()}}</h4>
                            <p class="mb-0 ">Users Registered Today</p>                        
                            <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#222"
                            data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(0, 150, 136)" data-spot-Color="rgb(0, 188, 212)"
                            data-offset="90" data-width="100%" data-height="42px" data-line-Width="2" data-line-Color="#FFFFFF"
                            data-fill-Color="transparent"> 6,5,7,4,5,3,8,6,5 </div>
                        </div>
                    </div>
                </div>
               
                    <div class="col-lg-3 col-md-6">
                        <a href="{{route('today.payments')}}">
                            <div class="card">
                                <div class="body xl-green">
                                    <h4 class="mt-0 mb-0"  style="color: rgb(5,95,67)">Kshs {{$today_payments->sum('amount')}}</h4>
                                    <p class="mb-0 "  style="color: rgb(5,95,67)">Revenue Today</p>
                                    <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#222"
                                    data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(0, 150, 136)" data-spot-Color="rgb(0, 188, 212)"
                                    data-offset="90" data-width="100%" data-height="45px" data-line-Width="2" data-line-Color="rgb(5,95,67)"
                                    data-fill-Color="transparent"> 8,7,7,5,5,4,8,7,5 </div>
                                </div>
                            </div>
                        </a>
                    </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body xl-pink">
                            <h4 class="mt-0 mb-0">{{$tests_attempts}}</h4>
                            <p class="mb-0">Tests Attempted Today</p>
                            <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#222"
                            data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(0, 150, 136)" data-spot-Color="rgb(0, 188, 212)"
                            data-offset="90" data-width="100%" data-height="45px" data-line-Width="2" data-line-Color="#FFFFFF"
                            data-fill-Color="transparent"> 7,6,7,8,5,9,8,6,7 </div>
                        </div>                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('today.payments')}}">
                        <div class="card">
                            <div class="body xl-pink">
                                <h4 class="mt-0 mb-0">{{$today_payments->count()}}</h4>
                                <p class="mb-0">Number of Payments Today</p>
                                <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#222"
                                data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(0, 150, 136)" data-spot-Color="rgb(0, 188, 212)"
                                data-offset="90" data-width="100%" data-height="45px" data-line-Width="2" data-line-Color="#FFFFFF"
                                data-fill-Color="transparent"> 7,6,7,8,5,9,8,6,7 </div>
                            </div>                        
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body xl-green">
                            <h4 class="mt-0 mb-0"  style="color: rgb(5,95,67)">{{$total_attempts}}</h4>
                            <p class="mb-0 "  style="color: rgb(5,95,67)">Total Number of Test Attempts</p>
                            <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#222"
                            data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(0, 150, 136)" data-spot-Color="rgb(0, 188, 212)"
                            data-offset="90" data-width="100%" data-height="45px" data-line-Width="2" data-line-Color="rgb(5,95,67)"
                            data-fill-Color="transparent"> 8,7,7,5,5,4,8,7,5 </div>
                        </div>
                    </div>
                </div>
            </div>       
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Recent</strong> Payments</h2>
                    <ul class="header-dropdown">
                        <li class="remove">
                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                        </li>
                    </ul>
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
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments->take(10) as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->reference_code}}</td>
                                    <td>{{$item->user!=null ? $item->user->name : 'No name'}}</td>
                                    <td>{{$item->paying_phone_no !=null ? $item->paying_phone_no : $item->user->phone}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->amount}}</td>
                                </tr>
                            @empty
                                <td>No payment records to sh</td>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="card">
                        <div class="body">                            
                         <a href="{{route('reports.payments')}}" class="btn btn-success btn-sm">View Reports</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Recent</strong> Tests</h2>
                    <ul class="header-dropdown">
                        <li class="remove">
                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover product_item_list c_table theme-color mb-0">
                        <thead>
                            <tr>
                            
                                <th>Topic</th>
                                <th data-breakpoints="sm xs">Title</th>
                                <th data-breakpoints="xs">Number of Questions</th>   
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tests-> take(10) as $item)
                            <tr>
                                <td><h5>{{$item->topic->title}}</h5></td>
                                <td><span class="text-muted">{{$item->title}}</span></td>
                                <td>{{$item->questions->count()}}</td>
                            </tr>
                            @empty
                                <td>No tests to show</td>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="card">
                        <div class="body">                            
                         <a href="{{route('tests.index')}}" class="btn btn-success btn-sm">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection