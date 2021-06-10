@extends('layouts.main')

@section('title')
    <title>Profile Settings</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile Settings</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item active">Edit</li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Profile </strong>Details</h2>
                        </div>
                        <div class="body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $item)
                                        {{$item}}<br>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{route('profile.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="name">Name</label>
                                <div class="form-group">                                
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your email address" value="{{$profile->name}}">
                                </div>
                                <label for="email">Email Address</label>
                                <div class="form-group">                                
                                    <input type="text" id="email" name="email" value="{{$profile->email}}" class="form-control" placeholder="Enter your email address">
                                </div>
                                <label for="phone">Phone Number</label>
                                <div class="form-group">                                
                                    <input type="number" id="phone" name="phone" class="form-control" value="{{$profile->phone}}" placeholder="Enter your phone number">
                                </div>
                                <div class="form-group form-float">
                                    <div class="card">
                                        <div class="header">
                                            <h2>Upload Profile Photo</h2>
                                        </div>
                                        <div class="body">
                                            <input type="file" class="dropify" name="image"  data-default-file="{{asset('Images/'.$profile->photo)}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Update Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection