@extends('layouts.main')
@section('title')
    <title>Edit PDF</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit PDF</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item"><a href="{{route('pdfs.index')}}">PDFs</a></li>
                        <li class="breadcrumb-item active">Edit PDF</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Edit</strong> PDF</h2>
                        </div>
                        <div class="body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $item)
                                        {{$item}}<br>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{route('pdfs.update',$pdf->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <label for="">PDF Title </label>
                        
                                <div class="form-group form-float">
                                    <input type="text" value="{{$pdf->title}}" class="form-control" placeholder="Video Title" name="title" >
                                </div>
                                <label for="topic">Topic</label>
                                <div class="form-group form-float">
                                    <select name="topic_id" id="topic" class="form-control show-tick ms select2 ">
                                        @foreach ($topics as $item)
                                            <option {{$item->id==$pdf->topic->id ? 'selected':''}} value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="form-group form-float">
                                    <div class="card">
                                        <div class="header">
                                            <h2>Upload a PDF File</h2>
                                        </div>
                                        <div class="body">
                                            <input type="file" class="dropify" name="pdf" data-default-file="{{asset('pdfs/'.$item->pdf)}}">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit" >Edit PDF</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection