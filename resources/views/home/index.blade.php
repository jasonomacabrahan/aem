@extends('layouts.apppartial', [
    'namePage' => 'Welcome',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'welcome',
    'backgroundImage' => asset('assets') . "/img/bg2.png"
])

@section('content')

<div class="panel-header panel-header-sm">
</div>
<div class="content">
    
    <div class="container" id="login">
        @if ($message = Session::get('attendance'))
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Welcome Guest!</h4>
                    </div>
                    <div class="card-body">
                        <p>You are successfully registered to the given activity using the provided link</p>
                        <p>To make things easy for you, the system automatically created an account. See the details below:</p>
                        <ul>
                            <li>Email: <em>the email you provided earlier</em></li>
                            <li>Password: <em>88888888</em></li>
                        </ul>
                    </div>

                </div>
            </div>
            </div>
        @endif
                @auth
                <div class="row">
                   <div class="col-md-6">
                       <div class="card">
                            <div class="card-body p-5">
                                <h1>Welcome</h1>
                                <a href="{{ route('dashboard.index') }}" class="btn btn-lg btn-info me-2">Go to Dashboard<i class="fa fa-fw fa-arrow-right"></i></a>

                            </div>
                        </div>
                   </div>
                   <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-info">
                                <label class="text-white"><i class="fa fa-fw fa-info"></i>What's New</label>
                            </div>
                            <div class="card-body p-5">
                                <ul>
                                    <li>No Upcoming Software Updates</li>
                                </ul>
                            </div>
                        </div>
                   </div>
                </div>
                @endauth
                
                @guest
                <div class="row">
                    
                    <div class="col-md-6">
                        <h3 class="text-white">{{ __('Welcome to DICT - XI ( Davao Region ) Activity Event Monitoring System.') }}</h3>
                        <a href="{{ route('register.show') }}" class="btn btn-lg btn-info"><i class="fa-solid fa-fw fa-user-astronaut"></i>Register Now</a>
                        <hr>
                        <p class="text-lead text-light mt-3 mb-0">
                            @include('alerts.migrations_check')
                        </p>
                    </div>

                    <div class="col-md-2">

                    </div>
                    <div class="col-md-4">
                        <form role="form" method="POST" action="{{ route('login.perform') }}">
                            @csrf
                            <div class="card card-login">
                                <div class="card-header ">
                                <div class="logo-container">
                                    <img src="{{ asset('assets/img/favicon.png') }}" alt="">
                                </div>
                                </div>
                                <div class="card-body ">
                                    @include('layouts.partials.messages')
                                <div class="input-group no-border form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </div>
                                    </span>
                                    <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="username" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <div class="input-group form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons objects_key-25"></i></i>
                                    </div>
                                    </div>
                                    <input placeholder="Password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <button  type = "submit" class="btn btn-info btn-lg btn-block mb-3"><i class="fa fa-fw fa-sign-in"></i>{{ __('Login') }}</button>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ route('forget.password.get') }}" class="btn btn-xs btn-success card-link">Reset Password</a>
                                </div>
                            </div>
                            </form>
                    </div>
                    
                </div>
                @endguest
</div>
</div>

@endsection
@push('js')
    <script>
        $(document).ready(function() {
        demo.checkFullPageBackgroundImage();
        });
    </script>
@endpush