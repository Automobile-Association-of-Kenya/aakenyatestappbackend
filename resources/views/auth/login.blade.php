@extends('layouts.app')

@section('title')
<title> AAK Driving Test :: Sign In</title>
@endsection

@section('content')

<div class="authentication">
    <div class="container">
     
        <div class="row">
            
            <div class="col-lg-4 col-sm-12">
                <h4>AA Kenya Driving Test Portal</h4>
                <form class="card auth_form" action="{{route('login')}}" method="POST">
                    <div class="header">
                        <img class="logo" src="assets/images/logo.jpg" alt="">
                        <h5>Log in</h5>
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
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="input-group-append">                                
                                <span class="input-group-text"><a href="#" class="forgot" title="Forgot Password"><i class="zmdi zmdi-lock"></i></a></span>
                            </div>                            
                        </div>
                        <div class="checkbox">
                            <input id="remember_me" type="checkbox">
                            <label for="remember_me">Agree to AAK <a href="/privacy"><strong>Privacy Policy</strong></a></label>
                        </div>
                        <button class="btn btn-primary btn-block waves-effect waves-light">SIGN IN</button>                        
                        <div class="signin_with mt-3">
                            <p class="mb-0"> <a class="ml-3" href="{{route('password.request')}}">Forgot Password?</a></p>
                        </div>
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
