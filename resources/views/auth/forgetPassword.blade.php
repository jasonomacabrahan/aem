@extends('layouts.app', [
    'namePage' => 'Login page',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'login',
    'backgroundImage' => asset('assets') . "/img/bg2.png",
])

@section('content')
    <div class="content">
        <div class="container">
        
        <div class="col-md-6 ml-auto mr-auto">
            <div class="card">
                <div class="card-header">Reset Password</div>
                <div class="card-body">

                  @if (Session::has('message'))
                       <div class="alert alert-success" role="alert">
                          {{ Session::get('message') }}
                      </div>
                  @endif

                    <form action="{{ route('forget.password.post') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="text" id="email_address" class="form-control rounded-0" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-info">
                                Send Password Reset Link
                            </button>
                        </div>
                    </form>
                      
                </div>
            </div>
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