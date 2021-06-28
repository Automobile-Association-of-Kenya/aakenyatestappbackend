@extends('layouts.main')
@section('title')
    <title>Add Payment</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Payment</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item"><a href="{{route('payments.index')}}">Payments</a></li>
                        <li class="breadcrumb-item active">Add Payment</li>
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
                            <h2><strong>Add</strong> Payment</h2>
                        </div>
                        <div class="body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $item)
                                        {{$item}}<br>
                                    @endforeach
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                        {{session('error')}}
                                </div>
                            @endif
                            <form action="{{route('payments.store')}}" method="POST" >
                                @csrf
                                <label for="">User Email</label>
                                <div class="form-group form-float">
                                    <input type="email" class="form-control" placeholder="User Email" name="email" >
                                </div>
                                <label for="">MPESA Receipt Number</label>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="MPESA Receipt Number" name="reference_code" >
                                </div>
                                <label for="">Amount</label>
                                <div class="form-group form-float">
                                    <input type="number" class="form-control" placeholder="Payment Amount" name="amount" >
                                </div>
                                <div class="form-group form-float">
                                    <label for="topic">Packages</label> 
                                    <span><select class="form-control show-tick ms select2" data-placeholder="Select" name="package_id">
                                       
                                        @foreach ($packages as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    </span>
                                </div>
                                <div id="multi" >
                                    <div class="container">
                                        <div class="row clearfix">
                                            <div class="col-sm-10">
                                                <div class="form-group">                                    
                                                    <h1 class="card-inside-title">Topics</h1>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 ">
                                                <div class="checkbox">
                                                    <input id="all" type="checkbox" name="all" value="all">
                                                    <label for="all">
                                                            Select All
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @foreach ($topics as $item)
                                    <div class="container">
                                        <div class="row clearfix border rounded pt-3">
                                            <div class="col-sm-10">
                                                <div class="form-group">                                    
                                                    <label for="">{{$item->title}}</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="checkbox">
                                                    <input id="{{$item->id}}" class="check" type="checkbox" name="topics[]" value="{{$item->id}}">
                                                    <label for="{{$item->id}}">
                                                            Select
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    @endforeach
                                </div>
                                <button class="btn btn-primary" type="submit" >Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
    <script>
        $(function() {

$('#all').click(function() {
    if ($(this).prop('checked')) {
        $('.check').prop('checked', true);
    } else {
        $('.check').prop('checked', false);
    }
});

});
    </script>
@endsection