
@extends('layouts.main')
@section('title')
    <title>Edit Test</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit Test</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item"><a href="{{route('tests.index')}}">Tests</a></li>
                        <li class="breadcrumb-item active">Edit Test</li>
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
                            <h2><strong>Edit</strong> Test</h2>
                        </div>
                        <div class="body">
                            @if ($errors->any())
                            @foreach ($errors->all() as $item)
                            <div class="alert alert-danger">
                                {{$item}}<br>
                            </div>
                            @endforeach
                            @endif
                            <form action="{{route('tests.update',$test->id)}}" method="POST" >
                                @csrf
                                @method('patch')
                                <label for="">Test Code</label>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Test Code" name="code" value="{{$test->code}}">
                                </div>
                                <label for="">Title</label>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{$test->title}}" >
                                </div>
                                <label for="">Order</label>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Title" name="order" value="{{$test->order}}" >
                                </div>
                                <div class="form-group form-float">
                                    <label for="topic">Topic</label> 
                                    <span><select class="form-control show-tick ms select2" data-placeholder="Select" name="topic_id">
                                        @foreach ($topics as $item)
                                            <option {{$item->id==$test->topic_id?'selected':''}} value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    </span>
                                </div>

                                <button class="btn btn-primary" type="submit" >Edit</button>
                    
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
                        <a href="{{route('questions.create',$test->id)}}" class="btn btn-success btn-md float-left" type="button">Add Question</a>
                        <div class="table-responsive">
                            <table class="table table-hover product_item_list c_table theme-color mb-0">
                                <thead>
                                    <tr>
                                        
                                        <th data-breakpoints="sm xs">#</th>
                                        <th data-breakpoints="xs">Question</th>
                                        <th data-breakpoints="xs">Marks</th>
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
                                    @forelse ($questions as $item)
                                        <tr>
                                            <input type="hidden" class="delete_value_id" value="{{$item->id}}">
                                            <td><h5>{{$item->id}}</h5></td>
                                            <td><span class="text-muted">{{$item->question}}</span></td>
                                            <td><span class="text-muted">{{$item->marks}}</span></td>
                                            <td>
                                                <a href="{{route('questions.edit',$item->id)}}" class="btn btn-default waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                                <button type="button"  class="btn btn-default waves-effect waves-float btn-sm waves-red topicdelete"><i class="zmdi zmdi-delete"></i></button>  
                                            </td>
                                        </tr>
                                    @empty
                                        <td>No questions to display</td>
                                    @endforelse      
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">                            
                            <ul class="pagination pagination-primary m-b-0">
                                {{$questions->links()}}
                            </ul>
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
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".topicdelete").click(function (e) { 
                e.preventDefault();
                var delete_value= $(this).closest("tr").find('.delete_value_id').val();
                //alert(delete_value);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this question information!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    var data={
                        "_token": $('input[name="csrf-token"]').val(),
                        "id":delete_value,
                    }
                    $.ajax({
                        type: "DELETE",
                        url: '/questions/'+delete_value+"/delete",
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            })
                            .then((result) => {
                                location.reload();
                            });
                        }
                    });

                } else {
                        swal("Question data is safe!");
                }
                });
            });
        });

    </script>
@endsection