
@extends('layouts.app')

@section('title')
<title> AAK Driving Test :: Reset Password</title>
@endsection

@section('content')

<div class="authentication">
    <div class="container">
        <h4>AA Kenya Driving Test Portal</h4>
        <div class="row">
            
            <div class="col-lg-4 col-sm-12">
               
                <form class="card auth_form" action="{{route('password.email')}}" method="POST">
                    <div class="header">
                        <img class="logo" src="{{asset('assets/images/logo.jpg')}}" alt="">
                        <h5></h5>
                    </div>
                    <div class="body">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $item)
                                    {{$item}}
                                @endforeach
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                     
                    </div>
                </form>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span><a href="/">AA Kenya</a></span>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 ">
                <div class="card">
                    <img src="{{asset('assets/images/splash.jpg')}}" width="60%" style="margin-left:25%;" alt="Sign In"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
