
@extends('layouts.main')
@section('title')
    <title>Tests</title>
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
                    
                        <li class="breadcrumb-item active">Tests List</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <a href="{{route('tests.create')}}" class="btn btn-success btn-md float-right" type="button">Add Test</a>
                        <div class="table-responsive">
                            <table class="table table-hover product_item_list c_table theme-color mb-0">
                                <thead>
                                    <tr>
                                        
                                        <th data-breakpoints="sm xs">Code</th>
                                        <th data-breakpoints="sm xs">Title</th>
                                        <th data-breakpoints="xs">No of Questions</th>
                                        <th data-breakpoints="xs">Added By:</th>
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
                                    @forelse ($tests as $item)
                                    <tr>
                                        <input type="hidden" class="delete_value_id" value="{{$item->id}}">
                                        <td><h5>{{$item->code}}</h5></td>
                                        <td><h5>{{$item->title}}</h5></td>
                                        <td><span class="text-muted">{{$item->questions->count()}}</span></td>
                                        <td>{{$item->user}}</td>
                                        <td>
                                            <a href="{{route('tests.edit',$item->id)}}" class="btn btn-default waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                            <button type="button"  class="btn btn-default waves-effect waves-float btn-sm waves-red topicdelete"><i class="zmdi zmdi-delete"></i></button>  
                                    </tr>
                                    @empty
                                        <td>No tests to show</td>
                                    @endforelse      
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">                            
                            <ul class="pagination pagination-primary m-b-0">
                                {{$tests->links()}}
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
                    text: "Once deleted, you will not be able to recover this test information!",
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
                        url: "/tests/"+delete_value+"/delete",
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
                        swal("Test data is safe!");
                }
                });
            });
        });

    </script>
@endsection
