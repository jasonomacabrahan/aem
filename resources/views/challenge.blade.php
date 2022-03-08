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
               <div class="card-header">

               </div>
               <div class="card-body">
                    <h1>Registration was successful!</h1>
                    <p>Please Confirm your account using email address.</p>
                    {{-- <label>Email:{{ $email }}</label> --}}
                    <?php
                            $email =[
                                'email' =>$email,
                            ];
                        $email= Crypt::encrypt($email);
                    ?>
                    <a href={{ route('send-mail', ['email' => $email])  }} class="btn btn-info">Get Confirmation Code</a>
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
