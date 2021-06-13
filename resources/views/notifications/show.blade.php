
@extends('layouts.main')
@section('title')
    <title>Read Notification</title>
@endsection
<style>
    .teal:hover{
        background-color: #055F43 !important;
    }
</style>
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Read Notification</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item"><a href="{{route('notifications.index')}}"> Notifications</a></li>
                        <li class="breadcrumb-item active">Read Notification</li>
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
                <div class="col-md-12">
                    <div class="d-flex">
                        <div class="mobile-left">
                            <a class="btn btn-info btn-icon toggle-email-nav collapsed" data-toggle="collapse" href="#email-nav" role="button" aria-expanded="false" aria-controls="email-nav">
                                <span class="btn-label"><i class="zmdi zmdi-more"></i></span>
                            </a>
                        </div>
                        <div class="inbox">
                            <div class="card">
                                <div class="body mb-2">
                                    <div class="d-flex justify-content-between flex-wrap-reverse">
                                        @if ($notification->data['type']=='register')
                                        <h5 class="mt-0 mb-0 font-17">New user notification</h5>
                                        @elseif($notification->data['type']=='test')
                                        <h5 class="mt-0 mb-0 font-17">Test done notification</h5>
                                        @elseif($notification->data['type']=='profile')
                                        <h5 class="mt-0 mb-0 font-17">User profile updated notification</h5>
                                        @elseif($notification->data['type']=='payment')
                                        <h5 class="mt-0 mb-0 font-17">New payment made notification</h5>
                                        @endif
                                      
                                        <div>
                                            <small>{{$notification->created_at}}</small>
                                            <a class="p-2" href="{{route('notifications.delete',$notification->id)}}"><i class="zmdi zmdi-delete text-danger"></i></a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="body mb-2">
                                    <h6>Hello,</h6>
                                    <br>
                                    @if ($notification->data['type']=='register')
                                    <p>New user <b>{{$notification->data['name']}}</b> registered through the AAK Test App. You can view user reports for <br> details via the link<a href="{{route('reports.users')}}"> User Reports</a></p>
                                    @elseif($notification->data['type']=='test')
                                    <p><b>{{$notification->data['name']}}</b> attempted a test on the AAK Test App. You can view test reports for <br> details via the link<a href="{{route('reports.tests')}}"> User Reports</a></p>
                                    @elseif($notification->data['type']=='profile')
                                    <p><b>{{$notification->data['name']}}</b> updated profile in the AAK Test App. You can view user reports for details <br>via the link<a href="{{route('reports.users')}}"> User Reports</a></p>
                                    @elseif($notification->data['type']=='payment')
                                    <p><b>{{$notification->data['name']}}</b> made a new payment via the AAK Test App. You can view payments reports for details <br> via the link <a href="{{route('reports.payments')}}">User Reports</p>
                                    @endif

                                    <br>
                                   
                                </div>
                                <div class="body">
                                    <a href="{{route('notifications.index')}}" class="p-2"><i class="zmdi zmdi-mail-reply"></i> Back</a>
                                    
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