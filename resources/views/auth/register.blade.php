@extends('layouts.app')

@section('content')
<div class="authentication">    
    <div class="container">
        <h4>AA Kenya Driving Test Portal</h4>
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form class="card auth_form" action="{{route('register')}}" method="POST">
                    <div class="header">
                        <img class="logo" src="assets/images/logo.jpg" alt="">
                        <h5>Sign Up</h5>
                        <span>Register a new user</span>
                    </div>
                    <div class="body">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $item)
                                    {{$item}}<br>
                                @endforeach
                            </div>
                        @endif
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="name">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter Email" name="email">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            </div>
                        </div>                        
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="input-group-append">                                
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>                            
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                            <div class="input-group-append">                                
                                <span class="input-group-text"><i class="zmdi zmdi-info"></i></span>
                            </div>                            
                        </div>
                        <div class="checkbox">
                            <input id="remember_me" type="checkbox">
                            <label for="remember_me">I read and agree to the <a href="javascript:void(0);">terms of usage</a></label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">SIGN UP</button>
                        <div class="signin_with mt-3">
                            <a class="link" href="{{route('login')}}">You already have an account?</a>
                        </div>
                    </div>
                </form>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span><a href="/">AA Kenya</a></span>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="assets/images/splash.jpg" width="75%" style="margin-left:15%;" alt="Sign Up" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
