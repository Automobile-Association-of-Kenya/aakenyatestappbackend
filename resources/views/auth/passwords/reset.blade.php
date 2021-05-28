{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

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
               
                <form class="card auth_form" action="{{route('password.update')}}" method="POST">
                    <div class="header">
                        <img class="logo" src="{{asset('assets/images/logo.jpg')}}" alt="">
                        <h5>Log in</h5>
                    </div>
                    <div class="body">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $item)
                                    {{$item}}<br>
                                @endforeach
                            </div>
                        @endif
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Email" name="email" {{ $email ?? old('email') }}>
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
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                            <div class="input-group-append">                                
                                <span class="input-group-text"><a href="#" class="forgot" title="Forgot Password"><i class="zmdi zmdi-info"></i></a></span>
                            </div>                            
                        </div>
                        <button class="btn btn-primary btn-block waves-effect waves-light">Reset Password</button>                        
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

