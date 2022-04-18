@extends('layouts.apppartial', [
    'namePage' => 'Success',
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