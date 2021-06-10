@extends('layouts.main')

@section('title')
    <title>Change Password</title>
@endsection

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Change Password</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
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
                            <form action="{{route('password.change',Auth::user()->id)}}" method="POST">
                                @csrf
                                <label for="old">Old Password</label>
                                <div class="form-group">                                
                                    <input type="password" id="old" name="old" class="form-control" placeholder="Enter old password" >
                                </div>
                                <label for="password">New Password</label>
                                <div class="form-group">                                
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password">
                                </div>
                                <label for="confirm">Confirm Password</label>
                                <div class="form-group">                                
                                    <input type="password" id="confirm" name="password_confirmation" class="form-control"  placeholder="Confirm password">
                                </div>
                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection