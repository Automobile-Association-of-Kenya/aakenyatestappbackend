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
                            <h2>{{$file_size }} MB<small class="info">Storage</small></h2>                            
                            <div class="progress m-t-10">
                            <div class="progress-bar {{$remaining <=25 ? 'l-green':($remaining> 25 && $remaining<= 50 ? 'l-blue':'l-blush')}}" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: {{$remaining <=25 ? '25%;':($remaining> 25 && $remaining<= 50 ? '50%;':'100%;')}}""></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card widget_2">
                        <div class="body big_icon documents">
                            <h6>PDFs Uploaded</h6>
                            <h2>{{$pdfs->count()}} <small class="info">Count</small></h2>                            
                            <div class="progress m-t-10">
                            <div class="progress-bar {{$remaining <=25 ? 'l-green':($remaining> 25 && $remaining<= 50 ? 'l-blue':'l-blush')}}" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: {{$remaining <=25 ? '25%;':($remaining> 25 && $remaining<= 50 ? '50%;':'100%;')}}"></div>
                            </div>
                        </div>
                    </div>
                </div>                    
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card widget_2">
                        <div class="body big_icon media_w">
                            <h6>PDFs Views</h6>
                            <h2>{{$views->count()}} <small class="info">Views</small></h2>
                            <div class="progress m-t-10">
                                <div class="progress-bar {{$remaining <=25 ? 'l-green':($remaining> 25 && $remaining<= 50 ? 'l-blue':'l-blush')}}" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: {{$remaining <=25 ? '25%;':($remaining> 25 && $remaining<= 50 ? '50%;':'100%;')}}"></div>
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
                                            <form action="{{route('pdf.pdfs')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="to" value={{$to}}>
                                                <input type="hidden" name="from" value={{$from}}>
                                                <button class="btn btn-primary btn-small" type="submit"><i class="zmdi zmdi-print text-white"></i></button>
                                            </form> 
                                        </div>
                                    </div>
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
                                                <td><span class="owner">{{$item->views->count()}}</span></td>
                                                <td><span class="date">{{$item->created_at}}</span></td>
                                                <td><span class="size">{{number_format((float)(\File::size(public_path('pdfs_uploads/'.$item->video)))/1048576,4,'.','')}} MB</span></td>
                                            </tr> 
                                            @empty
                                                <td>No PDFs to display</td>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <span class="text-primary">{{$pdfs->links()}}</span> 
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
