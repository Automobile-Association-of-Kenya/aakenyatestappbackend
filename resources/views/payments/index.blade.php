
@extends('layouts.main')
@section('title')
    <title>Payments</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Payments</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                    
                        <li class="breadcrumb-item active">Payments</li>
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
                        <a href="{{route('payments.create')}}" class="btn btn-success btn-md float-right" type="button">Add Payment</a>
                        <div class="table-responsive">
                            <table class="table table-hover c_table">
                                <thead>
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th>MPESA Code</th>
                                        <th>User Name</th>
                                        <th>Phone Number</th>
                                        <th>Date</th>
                                        <th>Amount</th>   
                                        <th>Package</th>                                 
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payments as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->reference_code}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->paying_phone_no}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->amount}}</td>
                                        <td>{{$item->package->name}}</td>
                                    </tr>
                                    @empty
                                        <td>No payment records to show</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">                            
                            <ul class="pagination pagination-primary m-b-0">
                                {{$payments->links()}}
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
