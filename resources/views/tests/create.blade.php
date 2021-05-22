@extends('layouts.main')
@section('title')
    <title>Add Test</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Test</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item"><a href="{{route('tests.index')}}">Tests</a></li>
                        <li class="breadcrumb-item active">Add Test</li>
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
                            <h2><strong>Create</strong> Test</h2>
                        </div>
                        <div class="body">
                            <form action="{{route('tests.store')}}" method="POST" >
                                @csrf
                                <label for="">Title</label>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Title" name="title" >
                                </div>
                                <div class="form-group form-float">
                                    <label for="topic">Topic</label> 
                                    <span><select class="form-control show-tick ms select2" data-placeholder="Select">
                
                                        <option>Car safety</option>
                                        <option>Fundamentals of driving</option>
                                        <option>Cockpit Drill</option>
                                    </select>
                                    </span>
                                </div>

                                <button class="btn btn-primary" type="submit" >Create</button>
                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <a href="{{route('topics.create')}}" class="btn btn-success btn-md float-left" type="button">Add Question</a>
                        <div class="table-responsive">
                            <table class="table table-hover product_item_list c_table theme-color mb-0">
                                <thead>
                                    <tr>
                                        
                                        <th data-breakpoints="sm xs">#</th>
                                        <th data-breakpoints="xs">Question</th>
                                        <th data-breakpoints="sm xs md">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                    @endif
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $item)
                                            {{$item}}<br>
                                        @endforeach
                                    @endif
                                    
                                    <tr>
                                       
                                        <td><h5>1</h5></td>
                                        <td><span class="text-muted">What are fundamentals of driving?</span></td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                       
                                        <td><h5>2</h5></td>
                                        <td><span class="text-muted">Describe the cockpit drill.</span></td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td><h5>3</h5></td>
                                        <td><span class="text-muted">Which one of the following is a vehicle safety checks while driving?</span></td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h5>4</h5></td>
                                        <td><span class="text-muted">What is the importance of knowing how to use the buttons and switches in the car?</span></td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></a>
                                        </td>
                                    </tr>       
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">                            
                            <ul class="pagination pagination-primary m-b-0">
                                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection