@extends('layouts.app', [
    'namePage' => 'Login page | ',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'login',
    'backgroundImage' => asset('assets') . "/img/bg2.png",
])

@section('content')
    <div class="content">
        <div class="container">
        
        <div class="col-md-4 ml-auto mr-auto">

                    @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <script>
                            swal("Success","Registration was Successful","success");
                        </script>
                    @endif


                    @if ($message = Session::get('error'))
                        <script>
                            swal("Oops!","Problem creating your account","error");
                        </script>
                    @endif

                

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
                            </div>
                            <div class="card-footer ">
                                <button  type = "submit" class="btn btn-info btn-lg btn-block mb-3"><i class="ui-1_lock-circle-open"></i>{{ __('Login') }}</button>
                                <a href="{{ route('forget.password.get') }}">Reset Password</a>
                            </div>
                        </div>
                        </form>
        </div>
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
