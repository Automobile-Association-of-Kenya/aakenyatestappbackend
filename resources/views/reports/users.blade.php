@extends('layouts.main')
@section('title')
    <title>User Reports</title>
@endsection
@section('content')
<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>User Reports</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item active">User Reports</li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong><i class="zmdi zmdi-chart"></i> User</strong> Reports</h2>
                            
                        </div>
                        
                        <div class="body">
                            <div id="chart-area-spline-sracked" class="c3_chart d_sales"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
          
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>User</strong> Reports</h2>
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
                           
                        </div>
                        <br>
                        <div class="table-responsive">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                        
                                    
                              
                            <table class="table table-hover mb-0 c_list c_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>                                    
                                        <th data-breakpoints="xs">Phone</th>
                                        <th data-breakpoints="xs">Email</th>
                                        <th data-breakpoints="xs">Date Registered</th>
                                        <th data-breakpoints="xs">Tests Done</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $item)
                                    <tr>
                                        <td>  
                                            <label for="delete_2">USER#{{$item->id}}</label>
                                        </td>
                                        <td>
                                            @if (Auth::user()->photo==null)
                                                <a class="avatar w30" href="profile.html"><i class="zmdi zmdi-account-circle zmdi-hc-2x mr-5 "></i></a>
                                            @else
                                                <img src="assets/images/xs/avatar1.jpg" class="avatar w30" alt="">
                                            @endif
                                            <p class="c_name">{{$item->name}}</p>
                                        </td>
                                        <td>
                                            <span class="phone"><i class="zmdi zmdi-whatsapp mr-2"></i>{{$item->phone}}</span>
                                        </td>
                                        <td>
                                            <span class="email"><a href="javascript:void(0);" title="">{{$item->email}}</a></span>
                                        </td>
                                        <td>
                                            <span>{{$item->created_at}}</span>
                                        </td>
                                        <td>
                                            <span>3</span>
                                        </td>
                                    </tr>
                                    @empty
                                        <td>No users to show</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                   <span class="text-primary">{{$users->links()}}</span> 
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
    <script>
        $(function() {
    "use strict";
    initSparkline();
    initC3Chart();    
});

function initSparkline() {
    $(".sparkline").each(function() {
        var $this = $(this);
        $this.sparkline('html', $this.data());
    });
}
        function initC3Chart() {
    setTimeout(function(){ 
        $(document).ready(function(){
            var chart = c3.generate({
                bindto: '#chart-area-spline-sracked', // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        ['data1', 21, 8, 32, 18, 19, 17, 23, 12, 25, 37,50,100],

                    ],
                    type: 'area-spline', // default type of chart
                    groups: [
                        [ 'data1', 'data2', 'data3']
                    ],
                    colors: {
                        'data1': Aero.colors["gray"],
                        'data2': Aero.colors["teal"],
                        'data3': Aero.colors["lime"],
                    },
                    names: {
                        // name of each serie
                        'data1': 'Users',
                    }
                },
                axis: {
                    x: {
                        type: 'category',
                        // name of each category
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct','Nov','Dec']
                    },
                },
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
        });    
        $(document).ready(function(){
            var chart = c3.generate({
                bindto: '#chart-pie', // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        ['data1', 55],
                        ['data2', 25],
                        ['data3', 20],
                    ],
                    type: 'pie', // default type of chart
                    colors: {
                        'data1': Aero.colors["lime"],
                        'data2': Aero.colors["teal"],
                        'data3': Aero.colors["gray"],
                    },
                    names: {
                        // name of each serie
                        'data1': 'Arizona',
                        'data2': 'Florida',
                        'data3': 'Texas',
                    }
                },
                axis: {
                },
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
        });
        $(document).ready(function(){
            var chart = c3.generate({
                bindto: '#chart-area-step', // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        ['data1', 11, 8, 15, 7, 11, 13],
                        ['data2', 7, 7, 5, 7, 9, 12]
                    ],
                    type: 'area-step', // default type of chart
                    colors: {
                        'data1': Aero.colors["pink"],
                        'data2': Aero.colors["orange"]
                    },
                    names: {
                        // name of each serie
                        'data1': 'Today',
                        'data2': 'month'
                    }
                },
                axis: {
                    x: {
                        type: 'category',
                        // name of each category
                        categories: ['1', '2', '3', '4', '5', '6']
                    },
                },
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
        });
}, 500);
}
    </script>
@endsection