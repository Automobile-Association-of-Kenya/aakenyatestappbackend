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
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
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
                                        <h4 class="mt-0">Kshs 30,000</h4>                                        
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="icon xl-blue m-b-15"><i class="zmdi zmdi-chart"></i></div>
                                    <div class="col-in">
                                        <small class="text-muted mt-0">This Year</small>
                                        <h4 class="mt-0">Kshs 600,000</h4>                                        
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="icon xl-purple m-b-15"><i class="zmdi zmdi-card"></i></div>
                                    <div class="col-in">
                                        <small class="text-muted mt-0">Total Payments</small>
                                        <h4 class="mt-0">Kshs 1,200,000</h4>                                        
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
                            <ul class="header-dropdown">
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form>
                                <div class="row clearfix align-right">
                                    <div class="col-lg-2 col-md-2 col-sm-2 mt-2">
                                        <div class="form-group">
                                            <label for="">Filter by month</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <input type="month" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-lg-0.2 col-md-0.2 col-sm-0.2 ">
                                        <button type="submit" class="mt-2 ml-0" style="background:transparent;border:none;"><i class="zmdi zmdi-search"></i></button>          
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                                        <button class="btn btn-primary btn-small" type="button"><i class="zmdi zmdi-print text-white"></i></button>
                                    </div>

                                </div>
                            </form>
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
                m: '2021-01',
                Revenue: 1000,
            }, {
                m: '2021-02',
                Revenue: 1500,
            }, {
                m: '2021-03',
                Revenue: 5000,
            }, {
                m: '2021-04',
                Revenue: 1200,
            }, {
                m: '2021-05',
                Revenue: 1200,
            }, {
                m: '2021-06',
                Revenue: 8000,
            }, {
                m: '2021-07',
                Revenue: 5000,
            }

        ],
        lineColors: ['#00ced1'],
        xkey: 'm',
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