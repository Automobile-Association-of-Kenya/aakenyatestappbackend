
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
                    <h2>Mpesa Transactions</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item">Payments</li>
                        <li class="breadcrumb-item active">Mpesa Transactions</li>
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
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card project_list">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group form-float">
                                <form action="" id="form-search" method="get">
                                    <label for="type">Filter </label> 
                                    <span><select class="form-control show-tick ms select2" data-placeholder="Select" name="search" onchange="change_type()" id="access">
                                        <option value="0">Select </option>
                                        <a href="#?type=success"><option value="1" {{$search==1 ? 'selected':''}}>Success</option></a>
                                        <a href="#?type=incomplete"><option value="2" {{$search==2 ? 'selected':''}}>Incomplete</option></a>
                                    </select>
                                    </span>
                                </form>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label for="type" class="mb-2"> </label> 
                            <button form="form-search" class="btn btn-primary mt-4 btn-lg" type="submit" >Filter</button>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group form-float">
                                <label for="type"></label> 
                                <span> <div class="form-group form-float ">
                                    <input id="myInput" class="form-control" type="text" placeholder="Search ">
                                </div>
                                </span>
                            </div>
                               
                          </div>
                           
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover c_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mpesa Receipt</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Phone Number</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @forelse ($transactions as $item)
                                    <tr>
                                        <td><strong>{{$item->id}}</strong></td>
                                        <td><a href="" title="">{{$item->MpesaReceiptNumber}}</a></td>
                                        <td>{{$item->mount}}</td>
                                        <td>{{Str::limit($item->ResultDesc,45)}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->PhoneNumber}}</td>
                                        @if ((int)$item->ResultCode==0)
                                        <td><span class="badge badge-success">Success</span></td>
                                        @else
                                         <td><span class="badge badge-danger">Incomplete</span></td>
                                        @endif
                                        
                                    </tr>
                                    @empty
                                        
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination pagination-primary mt-4">
                            {{$transactions->links()}}
                        </ul>
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
    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
        
@endsection
