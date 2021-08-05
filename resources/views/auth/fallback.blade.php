
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
                            <div class="signin_with mt-3">
                                <a class="link" href="https://aadrivingtest.co.ke/app-release.apk"><i class="zmdi zmdi-smartphone-download mr-1"></i>Download Driving Test App</a>
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
                <div class="signin_with ml-5">
                    <a class=" link card auth_form border border-success bg-success text-white w-75" href="https://aadrivingtest.co.ke/aak-driving-test-app.apk"><span class=" h5">Driving Test App<img src="assets/images/playstore.png" class="ml-2" width="30%" alt="Sign In"/></span></a>
                </div>
                <div class="card">
                    <img src="assets/images/splash.jpg" width="70%" style="margin-left:18%;" alt="Sign In"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
