@extends('layouts.main')
@section('title')
    <title>Add Topic</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Topic</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item"><a href="{{route('topics.index')}}">Topics</a></li>
                        <li class="breadcrumb-item active">Add Topic</li>
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
                            <h2><strong>Create</strong> Topic</h2>
                        </div>
                        <div class="body">
                            <form action="{{route('topics.store')}}" method="POST" >
                                @csrf
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Title" name="title" >
                                </div>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Description" name="description" >
                                </div>
                                <button class="btn btn-primary" type="submit" >Create</button>
                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection