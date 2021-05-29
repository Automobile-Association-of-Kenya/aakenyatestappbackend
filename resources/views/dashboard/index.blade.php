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
                            <h4 class="mt-0 mb-0"  style="color: rgb(5,95,67)">{{$users}}</h4>
                            <p class="mb-0" style="color: rgb(5,95,67)">Users</p>                        
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
                            <h4 class="mt-0 mb-0">{{$tests->count()}}</h4>
                            <p class="mb-0 ">Total Tests</p>                        
                            <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#222"
                            data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(0, 150, 136)" data-spot-Color="rgb(0, 188, 212)"
                            data-offset="90" data-width="100%" data-height="42px" data-line-Width="2" data-line-Color="#FFFFFF"
                            data-fill-Color="transparent"> 6,5,7,4,5,3,8,6,5 </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body xl-green">
                            <h4 class="mt-0 mb-0"  style="color: rgb(5,95,67)">{{$questions}}</h4>
                            <p class="mb-0 "  style="color: rgb(5,95,67)">Total Questions</p>
                            <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#222"
                            data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(0, 150, 136)" data-spot-Color="rgb(0, 188, 212)"
                            data-offset="90" data-width="100%" data-height="45px" data-line-Width="2" data-line-Color="rgb(5,95,67)"
                            data-fill-Color="transparent"> 8,7,7,5,5,4,8,7,5 </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body xl-pink">
                            <h4 class="mt-0 mb-0">15K</h4>
                            <p class="mb-0">Revenue</p>
                            <div class="sparkline" data-type="line" data-spot-Radius="1" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#222"
                            data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(0, 150, 136)" data-spot-Color="rgb(0, 188, 212)"
                            data-offset="90" data-width="100%" data-height="45px" data-line-Width="2" data-line-Color="#FFFFFF"
                            data-fill-Color="transparent"> 7,6,7,8,5,9,8,6,7 </div>
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
                                <th>Date</th>
                                <th>Amount</th>                                    
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>MP3E3ND300</td>
                                <td>Abraham</td>
                                <td>12-04-2020</td>
                                <td>3000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>MP3E3N93D</td>
                                <td>Maina</td>
                                <td>20-02-2021 </td>
                                <td>4000</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>ODUJE3453D</td>
                                <td>Ochieng</td>
                                <td>13-05-2021</td>
                                <td>2000</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>NDJE3FR3</td>
                                <td>Hillary</td>
                                <td>13-04-2020</td>
                                <td>1800</td>
                            </tr>
                        </tbody>
                    </table>
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
                            @forelse ($tests-> take(5) as $item)
                            <tr>
                                <td><h5>{{$item->topic_id==0 ? 'General' : $item->topic->title}}</h5></td>
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