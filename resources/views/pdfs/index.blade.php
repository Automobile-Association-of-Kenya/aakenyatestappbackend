@extends('layouts.main')
@section('title')
    <title>PDFs</title>
@endsection
@section('content')
<section class="content file_manager">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>PDF References</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item active">PDFs </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('pdfs.create')}}" class="btn btn-success btn-icon float-right" type="button"><i class="zmdi zmdi-upload"></i></a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                                @endif
                                <div class="row clearfix">
                                   
                                    @forelse ($pdfs as $item)
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                           
                                            <div class="file">
                                                    <div class="align-right">
                                                        <input type="hidden" class="video" value="{{$item->id}}">
                                                        <a href="{{route('pdfs.show',$item->id)}}" class="btn btn-icon btn-icon-mini btn-round btn-primary">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </a>
                                                        <a href="{{route('pdfs.edit',$item->id)}}" class="btn btn-icon btn-icon-mini btn-round btn-primary">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <button  type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger topicdelete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>

                                                    </div>
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-collection-pdf"></i>
                                                    </div>
                                                    <div class="file-name">
                                                        <p class="m-b-5 text-muted">{{$item->title}}</p>
                                                       
                                                        <small>Topic: <span class="text-muted">{{$item->topic->title}}</span></small>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <p>No PDFs to display</p>
                                    @endforelse
                                </div>
                            </div>
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
     //Prview video
    $(document).on('click','.view-video',function(){
            $('#myModal').modal();
            $("#playvideo").attr('src', $(this).attr('data-link'));
    }) 
    $('#myModal').on('hide.bs.modal', function (e) {
        $("#playvideo").attr('src',''); 
    }) 
//Delete modal
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".topicdelete").click(function (e) { 
        e.preventDefault();
        var delete_value= $(this).closest(".align-right").find('.video').val();
        //alert(delete_value);
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this PDF file!",
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
                url: '/pdfs/'+delete_value,
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
                swal("Your PDF is safe!");
        }
        });
    });
});

     
   
</script>
@endsection