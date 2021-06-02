
@extends('layouts.main')
@section('title')
    <title>Mark Tests</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Essay Tests </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                    
                        <li class="breadcrumb-item active">Essay Tests </li>
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
                        <div class="table-responsive">
                            <table class="table table-hover c_table">
                                <thead>
                                    <tr>
                                        <th>Test Code</th>
                                        <th>Question No. </th>
                                        <th>Marks</th>
                                        <th>User</th>
                                        <th>Awarded Score</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>A2586</strong></td>
                                        <td><a href="ticket-detail.html" title="">2</a></td>
                                        <td>20</td>
                                        <td>Tim Hank</td>
                                        <td>15</td>
                                        <td><span class="badge badge-warning">In Progress</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>A4578</strong></td>
                                        <td><a href="ticket-detail.html" title="">3</a></td>
                                        <td>30</td>
                                        <td>Tim Hank</td>
                                        <td>24</td>
                                        <td><span class="badge badge-success">Graded</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>A6523</strong></td>
                                        <td><a href="ticket-detail.html" title="">2</a></td>
                                        <td>20</td>
                                        <td>Gary Camara</td>
                                        <td>0</td>
                                        <td><span class="badge badge-info">Not Graded</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination pagination-primary mt-4">
                            <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
