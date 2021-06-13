@extends('layouts.main')
@section('title')
    <title>Tests Reports</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Test Reports</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item active">Test Reports</li>
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
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <input type="text" class="knob" value="{{$tests->count()}}" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#055F43" readonly>
                            <p>Tests <br><small>Total</small> </p>
                            <div class="d-flex bd-highlight text-center mt-4">
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Created</small>
                                    <h5 class="mb-0">{{$tests->count()}}</h5>
                                </div>
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Attempted</small>
                                    <h5 class="mb-0">{{$results->count()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <input type="text" class="knob" value="{{$results->average('score')}}" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#F9DD22" readonly>
                            <p>Mean Score <br><small>Total</small></p>
                            <div class="d-flex bd-highlight text-center mt-4">
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Mean Score</small>
                                    <h5 class="mb-0">{{$results->average('score')}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <input type="text" class="knob" value="{{$tests->count()}}" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#055F43" readonly>
                            <p>Total Tests <br> <small>This Year</small> </p>
                            <div class="d-flex bd-highlight text-center mt-4">
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Created</small>
                                    <h5 class="mb-0">{{$tests->count()}}</h5>
                                </div>
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Attempted</small>
                                    <h5 class="mb-0">{{$results->count()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <input type="text" class="knob" value="{{$results->average('score')}}" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#F9DD22" readonly>
                            <p>Mean Score <br><small>This Year</small> </p>
                            <div class="d-flex bd-highlight text-center mt-4">
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Mean Score</small>
                                    <h5 class="mb-0">{{$results->average('score')}}</h5>
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
                            <h2><strong>Tests</strong> Reports</h2>
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
                                            <form action="{{route('pdf.tests')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="to" value={{$to}}>
                                                <input type="hidden" name="from" value={{$from}}>
                                                <button class="btn btn-primary btn-small" type="submit"><i class="zmdi zmdi-print text-white"></i></button>
                                            </form>
                                            
                                        </div>

                                    </div>
                                
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover c_table">
                                <thead>
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th>Title</th>
                                        <th>Topic</th>
                                        <th>Number of Attempts</th> 
                                        <th>Highest score</th>   
                                        <th>Lowest score</th>                                  
                                        <th>Mean Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($all_tests as $item)
                                    <tr>
                                        <td>{{$item->code}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->topic->title}}</td>
                                        <td>{{$item->results->count()}}</td>
                                        <td>{{$item->results->max('score')}}</td>
                                        <td>{{$item->results->min('score')}}</td>
                                        <td>{{$item->results->average('score')}}</td>
                                    </tr>
                                    @empty
                                        <td>Nothing to show</td>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                           
                        </div>
                    </div>
                    <span class="text-primary">{{$all_tests->links()}}</span> 
                </div>
            </div>        
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{asset('assets/js/pages/ecommerce.js')}}"></script>
<script src="{{asset('assets/js/pages/charts/jquery-knob.min.js')}}"></script>
<script src="{{asset('assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob Plugin Js -->
 <script src="{{asset('assets/js/pages/index.js')}}"></script>  
@endsection