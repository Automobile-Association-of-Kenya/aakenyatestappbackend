@extends('layouts.main')
@section('title')
    <title>Edit User</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit User</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Admin Users</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                            <h2><strong>Edit</strong> User</h2>
                        </div>
                        <div class="body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $item)
                                        {{$item}}<br>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{route('users.update',$user->id)}}" method="POST" >
                                @csrf
                                @method('patch')
                                <label for="">User Name </label>
                                <div class="form-group form-float">
                                    <input type="text" value="{{$user->name}}" class="form-control" placeholder="User Name" name="name" >
                                </div>
                                <label for="">Email</label>
                                <div class="form-group form-float">
                                    <input type="text" value="{{$user->email}}" class="form-control" placeholder="Email" name="email" >
                                </div>
                                <label for="topic">Phone</label> 
                                <div class="form-group form-float">
                                    <input type="number" value="{{$user->phone}}" class="form-control" name="phone" placeholder="Phone Number" id="">
                                </div>
                                <label for="topic">Role</label> 
                                <div class="form-group form-float">
                                    <select class="form-control show-tick ms select2" name="role" >
                                        <option type="text" value="1" {{$user->role_id==1 ?'selected':''}}>Admin</option>
                                        <option type="text" value="0" {{$user->role_id==0 ?'selected':''}}>Super Admin</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submit" >Update User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection