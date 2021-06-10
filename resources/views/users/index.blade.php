
@extends('layouts.main')
@section('title')
    <title>Users</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Tests List</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                    
                        <li class="breadcrumb-item active">Admin Users List</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('users.create')}}" class="btn btn-success btn-icon float-right" type="button"><i class="zmdi zmdi-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        
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
                                        <th data-breakpoints="xs">Role</th>
                                        <th data-breakpoints="xs">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $item)
                                    <tr>
                                        <td>  
                                            <label for="delete_2">USER#{{$item->id}}</label>
                                        </td>
                                        <td>
                                            @if ($item->photo==null)
                                                <a class="avatar w30" href="profile.html"><i class="zmdi zmdi-account-circle zmdi-hc-2x mr-5 "></i></a>
                                            @else
                                                <img src="{{asset('Images/'.$item->photo)}}" class="avatar w30" alt="">
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
                                            <span>{{$item->role->name}}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('users.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                            <button class="btn btn-danger btn-sm" form="delete"><i class="zmdi zmdi-delete"></i></button>
                                            <form id="delete" action="{{route('users.destroy',$item->id)}}" method="post">@csrf @method('delete')</form>
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
