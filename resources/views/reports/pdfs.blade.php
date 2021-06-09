@extends('layouts.main')
@section('title')
    <title>PDF Reports</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>PDF Reports</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item active">PDF Reports</li>
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
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card widget_2">
                        <div class="body big_icon storage">
                            <h6>PDF Uploads </h6>
                            <h2>32GB <small class="info">Storage</small></h2>                            
                            <div class="progress m-t-10">
                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card widget_2">
                        <div class="body big_icon documents">
                            <h6>PDFs Uploaded</h6>
                            <h2>25 <small class="info">Count</small></h2>                            
                            <div class="progress m-t-10">
                            <div class="progress-bar l-yellow" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width: 12%;"></div>
                            </div>
                        </div>
                    </div>
                </div>                    
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card widget_2">
                        <div class="body big_icon media_w">
                            <h6>PDFs Views</h6>
                            <h2>20 <small class="info">Views</small></h2>
                            <div class="progress m-t-10">
                                <div class="progress-bar l-blue" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>PDF</strong> Reports</h2>
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
                        <div class="tab-content">
                            <div class="tab-pane active" id="list_view">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0 c_table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th data-breakpoints="xs">Number of Views</th>
                                                <th data-breakpoints="xs sm md">Date Created</th>
                                                <th data-breakpoints="xs">File size</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pdfs as $item)
                                            <tr>
                                                
                                                <td><span><i class="zmdi zmdi-collection-pdf w25"></i> {{$item->title}}</span></td>
                                                <td><span class="owner">10</span></td>
                                                <td><span class="date">{{$item->created_at}}</span></td>
                                                <td><span class="size">-</span></td>
                                            </tr> 
                                            @empty
                                                <td>No videos to display</td>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{asset('assets/bundles/footable.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->    
<script src="{{asset('assets/js/pages/tables/footable.js')}}"></script><!-- Custom Js -->
@endsection
