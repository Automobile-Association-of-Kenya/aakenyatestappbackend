
@extends('layouts.main')
@section('title')
    <title>Payment Packages</title>
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Payment Packages</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                    
                        <li class="breadcrumb-item active">Packages</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">   
                             
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('packages.create')}}" class="btn btn-success btn-icon float-right " type="button"><i class="zmdi zmdi-plus"></i></a>   
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $item)
                        {{$item}}<br>
                    @endforeach
                </div>
            @endif
            <div class="row clearfix">
                @forelse ($packages as $item)
                <div class="col-lg-4">
                    <div class="card pricing pricing-item">
                        <div class="pricing-deco {{$item->id%2!=0 ? 'l-slategray':'l-blue'}}">
                            <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                            </svg>
                            <div class="pricing-price"><span class="pricing-currency">Kshs</span>{{$item->amount}} <span class="pricing-period">/ {{$item->duration}} months</span>
                            </div>
                            <h3 class="pricing-title">{{$item->name}}</h3>
                        </div>
                        <div class="body">
                            <ul class="feature-list list-unstyled">
                                <li>{{$item->count_topics}} Topics</li>
                                <li>All tests </li>
                                <li>All video references</li>                            
                                <li>All PDF references</li>
                                <li><a href="{{route('packages.edit',$item->id)}}" class="btn {{$item->id%2!=0 ? 'btn-default':'btn-info'}}">Edit plan</a> <span> <button type="submit" class="btn btn-danger" form="delete">Delete plan</button></span></li>
                                <form id="delete" action="{{route('packages.destroy',$item->id)}}" method="post">@csrf @method('delete')</form>
                            </ul>
                        </div>
                    </div>
                </div>
                @empty
                    <li>No payment packages added</li>
                @endforelse
            </div>
            {{$packages->links()}}
        </div>
    </div>
</section>
@endsection

