
@extends('layouts.main')
@section('title')
    <title>Notifications</title>
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
                    <h2>Notifications</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item active">Notifications</li>
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
                            <div class="i_action d-flex justify-content-between align-items-center">
                                <div class="">
                                    <div class="">
                                        <a href="{{route('notifications.markallread')}}" class="btn btn-success btn-md bg-teal" title="Mark all read"> <i class="zmdi zmdi-email-open"></i> Mark All Read</a>
                                        <a href="{{route('notifications.deleteall')}}" class="btn btn-success  btn-md bg-danger" title="Delete all"> <i class="zmdi zmdi-delete"></i> Delete All</i></a>
                                    </div>
             
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table c_table inbox_table">
                                    @forelse ($notifications as $item)
                                    <tr style="background-color:{{$item->read_at==null ? '#D4D4D4':''}}">
                                        <td class="u_name"><h5 class="font-15 mt-0 mb-0">{{$item->data['name']}}</h6></td>
                                        <td width="3%"></td>
                                            <td class="max_ellipsis">
                                            <a class="link" href="{{route('notifications.show',$item->id)}}">
                                                @if ($item->data['type']=='register')
                                                <span class="badge badge-primary mr-2">New user</span>
                                               <span class="" >New user registered in the app.</span> 
                                                @elseif($item->data['type']=='test')
                                                <span class="badge badge-info mr-2">Test</span>
                                                <span class="" >New test completed in the app.</span>
                                                @elseif($item->data['type']=='profile')
                                                <span class="badge badge-danger mr-2">Profile updated</span>
                                                <span class=""  > User updated profile in the app.</span>
                                                @elseif($item->data['type']=='payment')
                                                <span class="badge badge-default mr-2">New Payment</span>
                                                <span class="" >New payment made in the app.</span>
                                                @endif
                                            </a>
                                        </td>
                                        <td class="time "><a href="{{route('notifications.markread',$item->id)}}"><i class="{{$item->read_at==null ? 'zmdi zmdi-email-open text-success':''}}"></i></a></td>
                                        <td class="time text-black"> <a href="{{route('notifications.delete',$item->id)}}"><i class="zmdi zmdi-delete text-danger"></i></a> </td>
                                        <td class="time mr-5 "><span class="text-black"> {{$item->created_at->diffForHumans()}}</span></td>
                                        <td width="10%"></td>
                                    </tr>
                                    @empty
                                        <td>No new notifications</td>
                                    @endforelse
                                </table>
                                {{$notifications->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection