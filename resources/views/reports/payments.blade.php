@extends('layouts.main')
@section('title')
    <title>Payment Reports</title>
@endsection
@section('content')
    <section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Payment Reports</h2>
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
                <div class="col-lg-12 col-md-12">
                    <div class="card product-report">
                        <div class="header">
                            <h2><strong>Payment</strong> Reports</h2>
                            <ul class="header-dropdown">
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="icon xl-amber m-b-15"><i class="zmdi zmdi-chart-donut"></i></div>
                                    <div class="col-in">
                                        <small class="text-muted mt-0">This Month</small>
                                        <h4 class="mt-0">Kshs {{$current_month}}</h4>                                        
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="icon xl-blue m-b-15"><i class="zmdi zmdi-chart"></i></div>
                                    <div class="col-in">
                                        <small class="text-muted mt-0">This Year</small>
                                        <h4 class="mt-0">Kshs {{$current_year}}</h4>                                        
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="icon xl-purple m-b-15"><i class="zmdi zmdi-card"></i></div>
                                    <div class="col-in">
                                        <small class="text-muted mt-0">Total Payments</small>
                                        <h4 class="mt-0">Kshs {{$total}}</h4>                                        
                                    </div>
                                </div>
                            </div>
                            <div id="area_chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Payment</strong> Records</h2>
                            <div class="body">
                                <form method="GET">
                                    <div class="row clearfix align-right">
                                        <div class="col-lg-1 col-md-1 col-sm-1 mt-2">
                                            <div class="form-group">
                                                <label for="">From</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="from" value="{{$from}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 mt-2">
                                            <div class="form-group">
                                                <label for="">To</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="to" value="{{$to}}" >
                                            </div>
                                        </div>
                                        <div class="col-lg-0.2 col-md-0.2 col-sm-0.2 ">
                                            <button type="submit" class="mt-2 ml-0" style="background:transparent;border:none;"><i class="zmdi zmdi-search"></i></button>          
                                        </div>
                                    </form>
                                        <div class="col-lg-3 col-md-3 col-sm- ">
                                            <form action="{{route('pdf.payments')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="to" value={{$to}}>
                                                <input type="hidden" name="from" value={{$from}}>
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
                                    @forelse ($payments as $item)
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
                    <span class="text-primary">{{$payments->links()}}</span> 
                </div>
            </div>       
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
//[custom Javascript]
//Project:	Aero - Responsive Bootstrap 4 Template
//Version:  1.0
//Last change:  15/12/2019
//Primary use:	Aero - Responsive Bootstrap 4 Template
//should be included in all pages. It controls some layout
$(function() {
    "use strict";
    MorrisArea();
});


function MorrisArea() {
    setTimeout(function(){
        Morris.Area({
            
            element: 'area_chart',
            data: [{
                r: '{{$data[0]}}',
                Revenue: {{$paymentmcount[0]}},
            }, {
                r: '{{$data[1]}}',
                Revenue: {{$paymentmcount[1]}},
            }, {
                r: '{{$data[2]}}',
                Revenue: {{$paymentmcount[2]}},
            }, {
                r: '{{$data[3]}}',
                Revenue: {{$paymentmcount[3]}},
            }, {
                r: '{{$data[4]}}',
                Revenue: {{$paymentmcount[4]}},
            }, {
                r: '{{$data[5]}}',
                Revenue: {{$paymentmcount[5]}},
            }, {
                r: '{{$data[6]}}',
                Revenue: {{$paymentmcount[6]}},
            }, {
                r: '{{$data[7]}}',
                Revenue: {{$paymentmcount[7]}},
            }, {
                r: '{{$data[8]}}',
                Revenue: {{$paymentmcount[8]}},
            }, {
                r: '{{$data[9]}}',
                Revenue: {{$paymentmcount[9]}},
            }, {
                r: '{{$data[10]}}',
                Revenue: {{$paymentmcount[10]}},
            }, {
                r: '{{$data[11]}}',
                Revenue: {{$paymentmcount[11]}},
            }
        ],
        lineColors: ['#00ced1'],
        xkey: 'r',
        ykeys: ['Revenue'],
        labels: [ 'Revenue'],
        pointSize: 0,
        lineWidth: 0,
        resize: true,
        fillOpacity: 0.8,
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        hideHover: 'auto'
        });
    }, 500);
}
</script>
@endsection