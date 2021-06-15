@extends('layouts.main')
@section('title')
    <title>Edit Package</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit Package</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item"><a href="{{route('packages.index')}}">Packages</a></li>
                        <li class="breadcrumb-item active">Edit Package</li>
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
                            <h2><strong>Edit</strong> Package</h2>
                        </div>
                        <div class="body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $item)
                                        {{$item}}<br>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{route('packages.update',$package->id)}}" method="POST" >
                                @csrf
                                @method('patch')
                                <label for="">Package Name</label>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Package Name" name="name" value={{$package->name}} >
                                </div>
                                <label for="">Amount <small>(Kshs)</small></label>
                                <div class="form-group form-float">
                                    <input type="number" class="form-control" placeholder="Amount" name="amount" value="{{$package->amount}}" >
                                </div>
                                <div class="form-group form-float">
                                    <label for="topic">Duration <small>(Months)</small></label> 
                                    <div class="form-group form-float">
                                        <input type="text" class="form-control" placeholder="Duration in months" name="duration" value="{{$package->duration}}">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label for="topic">Number of Topics Accessible</label> 
                                    <div class="form-group form-float">
                                        <input type="text" class="form-control" placeholder="e.g all,1,2, e.t.c" name="count_topics" value="{{$package->count_topics}}">
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit" >Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection